<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penghuni;
use App\Models\Kebersihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Laundry;
use App\Models\Transaction;

class PenghuniViewController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $data = Penghuni::with('kamarKos')->where('id_user', $user->id)->first();
        $dataLaundry = Laundry::with('user')->where('id_penghuni', $user->id)->get();

        // Ambil tanggal hari ini dalam format yang sesuai dengan database
        $hariIni = Carbon::now();

        // Query untuk jadwal kebersihan terdekat yang belum selesai
        $jadwalKebersihan = Kebersihan::where('status_kebersihan', 'belum')
            ->orderByRaw('ABS(DATEDIFF(tanggal_kebersihan, ?))', [$hariIni]) // Urutkan berdasarkan selisih hari terdekat
            ->first(); // Ambil hanya satu hasil (jadwal terdekat)

        // Jika ada jadwal terdekat, format tanggalnya
        if ($jadwalKebersihan) {
            $jadwalKebersihan->tanggal_kebersihan = Carbon::parse($jadwalKebersihan->tanggal_kebersihan)->locale('id')->format('d F Y');
        }


        return view('penghuni.home', compact('data', 'jadwalKebersihan', 'dataLaundry'));
    }
}
