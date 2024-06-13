<?php

namespace App\Http\Controllers;

use \Midtrans;
use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index()
    {
        return view('layouts.guest.booking');
    }
    public function invoice($id)
    {
        $data = Booking::findOrFail($id);

        return view('layouts.guest.invoice', compact('data'));
    }

    public function checkout(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_lengkap' => 'required|string',
            'no_telpon' => 'required|string',
            'email' => 'required|email',
            'tgl_masuk' => 'required|date',
            'modalTipeKamarInput' => 'required|string',
            'modalHargaInput' => 'required|integer',
            'modalDpInput' => 'required|integer',
        ]);

        $formattedTglMasuk = Carbon::parse($request->tgl_masuk)->format('Y-m-d');
        // $orderId = 'bk-' . time();

        $booking = Booking::create([
            'nama' => $request->nama_lengkap,
            // 'booking_id' => $orderId,
            'phone' => $request->no_telpon,
            'email' => $request->email,
            'tanggal_mulai' => $formattedTglMasuk,
            'total_harga' => $request->modalHargaInput,
            'status' => 'Unpaid',
            'tipe_kos' => $request->modalTipeKamarInput,
            'Dp' => $request->modalDpInput,
        ]);

        $dataBooking = Booking::find($booking->id);

        // Midtrans configuration
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = false; // or true if in production
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Prepare Midtrans parameters
        $params = array(
            'transaction_details' => array(
                'order_id' => $booking->id,
                'gross_amount' => $dataBooking->Dp,
            ),
            'customer_details' => array(
                'first_name' => $request->nama_lengkap,
                'email' => $request->email,
                'phone' => $request->no_telpon,
            ),
        );

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $dataBooking->update(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return back()->withErrors(['midtrans' => 'Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.']);
        }

        // Tampilkan modal dengan detail booking
        return view('layouts.guest.booking', compact('dataBooking', 'snapToken'))->with('success', 'Booking berhasil dibuat!');
    }

    public function checkoutView(Request $request, $bookingId)
    {
        $dataBooking = Booking::where('id', $bookingId)->first();

        // Midtrans configuration
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $bookingId,
                'gross_amount' => $dataBooking->Dp,
            ),
            'customer_details' => array(
                'first_name' => $request->nama_lengkap,
                'email' => $request->email,
                'phone' => $request->no_telpon,
            ),
        );

        // Get Snap Token, generate new one if it doesn't exist
        $snapToken = $dataBooking->snap_token;
        if (empty($snapToken)) {
            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                $dataBooking->update(['snap_token' => $snapToken]);
            } catch (\Exception $e) {
                // Handle Midtrans error, for example:
                return back()->withErrors(['midtrans' => 'Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.']);
            }
        }

        return view('layouts.guest.checkout', compact('snapToken', 'dataBooking'));
    }

    public function notificationHandler(Request $request)
    {
        $serverKey = config('services.midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            // Signature valid
            try {
                $booking = Booking::where('id', $request->order_id)->first();
                // Pastikan transaksi berhasil sebelum update status
                if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') { // Contoh status sukses
                    $booking->update(['status' => 'Paid']);
                } else {
                    Log::warning("Midtrans callback: Transaction not successful", ['data' => $request->all()]);
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

    public function deleteBooking($id){
        Booking::findOrFail($id)->delete();
        return redirect()->route('bookingGuest')->with('success', 'berhasil hapus data');
    }
}
