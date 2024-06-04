<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use \Midtrans;

class BookingController extends Controller
{
    public function index()
    {
        return view('layouts.guest.booking');
    }

    public function checkout(Request $request)
    {
        // Validate the request
        $request->validate([
            'nama_lengkap' => 'required|string',
            'no_telpon' => 'required|string',
            'email' => 'required|email',
            'tgl_masuk' => 'required|date',
            'modalTipeKamarInput' => 'required|string',
            'modalHargaInput' => 'required|integer',
            'modalDpInput' => 'required|integer',
        ]);

        // Add status to the request data
        $request->merge(['status' => 'Unpaid']);

        // Create booking record
        $booking = Booking::create([
            'nama' => $request->nama_lengkap,
            'phone' => $request->no_telpon,
            'email' => $request->email,
            'durasi_tinggal' => $request->tgl_masuk,
            'total_harga' => $request->modalHargaInput,
            'status' => 'Unpaid',
            'tipe_kos' => $request->modalTipeKamarInput,
            'Dp' => $request->modalDpInput,
        ]);

        // Generate unique order ID
        $orderId = $booking->id . '-' . time();

        // Midtrans configuration
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Create transaction details
        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => $booking->Dp,
            ),
            'customer_details' => array(
                'first_name' => $request->nama_lengkap,
                'email' => $request->email,
                'phone' => $request->no_telpon,
            ),
        );

        // Get Snap Token
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('layouts.guest.checkout', compact('snapToken', 'booking'));
        
    }
    public function notificationHandler(Request $request)
    {
        // Validasi signature dari Midtrans
        $serverKey = config('services.midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            // Ubah status pesanan menjadi "Paid"
            $booking = Booking::find($request->order_id);
            $booking->update(['status' => 'Paid']);
        }

        // Berikan respons OK ke Midtrans
        return response('OK', 200);
    }

}
