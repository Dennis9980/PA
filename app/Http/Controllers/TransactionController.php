<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Booking;
use App\Models\Laundry;
use App\Models\KamarKos;
use App\Models\Penghuni;
use App\Models\Kebersihan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookings = Transaction::where('jenis_transaksi', 'booking')
            ->search($request->input('keyword'))
            ->paginate(6);
        return view('layouts.transaksi.dataBooking', ['bookings' => $bookings, 'keyword' => $request->input('keyword')]);
    }

    public function indexOther(Request $request)
    {
        $transaksi = Transaction::where('jenis_transaksi', '!=', 'booking')
            ->search($request->input('keyword'))
            ->paginate(6);

        return view('layouts.transaksi.data-transaksi', ['transaksi' => $transaksi, 'keyword' => $request->input('keyword')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function invoice($id)
    {
        $data = Transaction::findOrFail($id);

        return view('layouts.invoice', compact('data'));
    }
    public function invoicePenghuni($id)
    {
        $data = Transaction::findOrFail($id);

        return view('layouts.invoice-penghuni', compact('data'));
    }

    public function store(Request $request)
    {
        // Validasi awal untuk jenis_transaksi
        // dd($request->all());
        $request->validate([
            'jenis_transaksi' => 'required|in:laundry,kebersihan,pelunasan_kamar,booking',
        ]);

        // Validasi input berdasarkan jenis transaksi
        $rules = [
            'nama_pembayar' => 'required',
            'jumlah_bayar' => 'required|',
            'tujuan_bayar' => 'nullable|string',
        ];

        if ($request->jenis_transaksi === 'booking') {
            $rules['no_telpon'] = 'required|string';
            $rules['email'] = 'required|email';
            $rules['tgl_masuk'] = 'required|date';
            $rules['modalTipeKamarInput'] = 'required|string';
            $rules['modalHargaInput'] = 'required|integer';
            $rules['modalDpInput'] = 'required|integer';
        } else {
            $rules['kamar'] = 'required';
        }
        $jmlh_bayar = preg_replace('/\D/', '', $request->input('jumlah_bayar'));
        $jmlh_bayar = intval($jmlh_bayar);
        $dpInput = preg_replace('/\D/', '', $request->input('modalDpInput'));
        $dpInput = intval($dpInput);
        $hargaInput = preg_replace('/\D/', '', $request->input('modalHargaInput'));
        $hargaInput = intval($hargaInput);

        // Buat transaksi
        $transaksi = Transaction::create([
            'nama_pembayar' => $request->input('nama_pembayar'),
            'jumlah_bayar' => $request->jenis_transaksi === 'booking' ? $dpInput : $jmlh_bayar,
            'tujuan_bayar' => $request->input('tujuan_bayar'),
            'jenis_transaksi' => $request->jenis_transaksi,
            'status' => 'pending',
            'tanggal_pembayaran' => Carbon::now(),
            'no_kamar' => $request->input('kamar'),
            'no_telpon' => $request->input('no_telpon', null), // Nilai default null jika bukan booking
            'email' => $request->input('email', null), // Nilai default null jika bukan booking
            'tgl_masuk' => $request->jenis_transaksi === 'booking' ? $request->input('tgl_masuk') : null,
            'tipe_kos' => $request->jenis_transaksi === 'booking' ? $request->input('modalTipeKamarInput') : null,
            'total_harga' => $request->jenis_transaksi === 'booking' ? $hargaInput : null,
            'dp' => $request->jenis_transaksi === 'booking' ? $dpInput : null,
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = false; // Atur ke true jika di production
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Prepare Midtrans parameters
        $params = array(
            'transaction_details' => array(
                'order_id' => $transaksi->id,
                'gross_amount' => $transaksi->jumlah_bayar,
            ),
            'customer_details' => array(
                'first_name' => $transaksi->nama_pembayar,
                'email' => $transaksi->email,
                'phone' => $transaksi->no_telpon,
            ),
        );

        try {
            $snapToken = Snap::getSnapToken($params);
            $transaksi->update(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return back()->withErrors(['midtrans' => 'Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.']);
        }

        // Check if it's a booking or other transaction
        if ($request->jenis_transaksi == 'booking') {
            // Tampilkan modal dengan detail booking
            $allTipeKamar = KamarKos::select('tipe')->distinct()->pluck('tipe');
            $tipeKamarKosong = KamarKos::select('tipe')
                ->whereDoesntHave('penghuni')
                ->groupBy('tipe')
                ->get()
                ->pluck('tipe');
            return view('layouts.guest.booking', compact('transaksi', 'snapToken', 'tipeKamarKosong', 'allTipeKamar'))->with('success', 'Booking berhasil dibuat!');
        } else {
            $user = auth()->user();
            $data = Penghuni::with('kamarKos')->where('id_user', $user->id)->first();
            $dataLaundry = Laundry::with('user')->where('id_penghuni', $user->id)->get();

            // Ambil tanggal hari ini dalam format yang sesuai dengan database
            $hariIni = Carbon::now();
            $bulanIni = Carbon::now()->month;
            $tahunIni = Carbon::now()->year;

            // Query untuk jadwal kebersihan terdekat yang belum selesai
            $jadwalKebersihan = Kebersihan::where('status_kebersihan', 'belum')
                ->orderByRaw('ABS(DATEDIFF(tanggal_kebersihan, ?))', [$hariIni]) // Urutkan berdasarkan selisih hari terdekat
                ->first(); // Ambil hanya satu hasil (jadwal terdekat)

            // Jika ada jadwal terdekat, format tanggalnya
            if ($jadwalKebersihan) {
                $jadwalKebersihan->tanggal_kebersihan = Carbon::parse($jadwalKebersihan->tanggal_kebersihan)->locale('id')->format('d F Y');
            }

            $dataKebersihan = Kebersihan::select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as bulan"),
                DB::raw('SUM(dana_kebersihan) as total_dana')
            )
                ->whereMonth('created_at', $bulanIni)
                ->whereYear('created_at', $tahunIni)
                ->groupBy('bulan')
                ->get();

            foreach ($dataKebersihan as $item) {
                $item->bulan = Carbon::createFromFormat('Y-m', $item->bulan)->locale('id')->format('F');
            }

            return view('penghuni.home', compact('data', 'dataKebersihan', 'jadwalKebersihan', 'dataLaundry', 'transaksi', 'snapToken'));
        }
    }

    public function notifHandler(Request $request)
    {
        $serverKey = config('services.midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            try {
                $transaksi = Transaction::where('id', $request->order_id)->first();

                Log::info("Notifikasi Midtrans diterima:", $request->all());
                Log::info("Transaksi yang ditemukan:", (array) $transaksi);

                if (!$transaksi) {
                    Log::error("Transaksi tidak ditemukan untuk order_id: {$request->order_id}");
                    return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
                }

                // Ambil pembayar dan penghuni hanya jika transaksi bukan booking
                $pembayar = null;
                $detailUser = null;
                if ($transaksi->jenis_transaksi != 'booking') {
                    $pembayar = User::where('name', $transaksi->nama_pembayar)->first();
                    $detailUser = $pembayar ? Penghuni::where('id_user', $pembayar->id)->first() : null;

                    if (!$pembayar || !$detailUser) {
                        Log::error("Data pengguna atau detail penghuni tidak ditemukan untuk order_id: {$request->order_id}");
                        return response()->json(['message' => 'Data pengguna tidak ditemukan'], 404);
                    }
                }

                // Update status transaksi
                switch ($request->transaction_status) {
                    case 'settlement':
                    case 'capture':
                        $transaksi->update(['status' => 'berhasil']);

                        if ($transaksi->jenis_transaksi != 'booking') {
                            if ($transaksi->jenis_transaksi == 'pelunasan_kamar') {
                                $detailUser->terbayar += $request->gross_amount;
                                $detailUser->save();
                            } elseif ($transaksi->jenis_transaksi == 'laundry') {
                                $detailUser->saldo_laundry += $request->gross_amount;
                                $detailUser->save();
                            } elseif ($transaksi->jenis_transaksi == 'kebersihan') {
                                $detailUser->dana_kebersihan += $request->gross_amount;
                                $detailUser->save();
                            }
                        }
                        break;

                    case 'deny':
                    case 'expire':
                    case 'cancel':
                        $transaksi->update(['status' => 'gagal']);
                        break;
                    default:
                        Log::error('Terjasi error');
                        break;
                }
            } catch (\Exception $e) {
                Log::error("Error processing Midtrans callback: " . $e->getMessage(), ['data' => $request->all()]);
            }
        } else {
            // Signature tidak valid
            Log::error("Invalid Midtrans callback signature", ['data' => $request->all()]);
            return response('Unauthorized', 401);
        }

        return response()->json(['message' => 'Notification received'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Transaction::findOrFail($id)->delete();

        return redirect()->back();
    }
}
