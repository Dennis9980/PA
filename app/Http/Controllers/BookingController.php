<?php

namespace App\Http\Controllers;

use \Midtrans;
use Carbon\Carbon;
use App\Models\Booking;
use App\Models\KamarKos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index()
    {
        // Ambil semua tipe kamar yang unik dari database
        $allTipeKamar = KamarKos::select('tipe')->distinct()->pluck('tipe');

        // Ambil tipe kamar yang MASIH memiliki kamar kosong
        $tipeKamarKosong = KamarKos::select('tipe')
            ->whereDoesntHave('penghuni') // Kamar yang tidak memiliki penghuni
            ->groupBy('tipe')
            ->get() // Mengambil semua tipe kamar yang memiliki setidaknya satu kamar kosong
            ->pluck('tipe');

        return view('layouts.guest.booking', compact('tipeKamarKosong', 'allTipeKamar'));
    }

    public function invoice($id)
    {
        $data = Booking::findOrFail($id);

        return view('layouts.guest.invoice', compact('data'));
    }

    public function deleteBooking($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->route('bookingGuest')->with('success', 'berhasil hapus data');
    }
}
