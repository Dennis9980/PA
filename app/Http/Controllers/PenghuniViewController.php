<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penghuni;
use App\Models\Kebersihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Laundry;

class PenghuniViewController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $data = Penghuni::with('kamarKos')->where('id_user', $user->id)->first();
        $dataLaundry = Laundry::with('user')->where('id_penghuni', $user->id)->get();

        // Ambil tanggal hari ini dalam format yang sesuai dengan database
        $hariIni = Carbon::now();
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        // Query untuk jadwal kebersihan terdekat yang belum selesai
        $jadwalKebersihan = Kebersihan::where('status', 'belum')
            ->orderByRaw('ABS(DATEDIFF(tanggal_kebersihan, ?))', [$hariIni]) // Urutkan berdasarkan selisih hari terdekat
            ->first(); // Ambil hanya satu hasil (jadwal terdekat)

        // Jika ada jadwal terdekat, format tanggalnya
        if ($jadwalKebersihan) {
            $jadwalKebersihan->tanggal_kebersihan = Carbon::parse($jadwalKebersihan->tanggal_kebersihan)->locale('id')->format('d F Y');
        }

        // ... (kode untuk $dataKebersihan tetap sama)
        // $dataKebersihan = Kebersihan::select(
        //     DB::raw("DATE_FORMAT(created_at, '%Y-%m') as bulan"),
        //     DB::raw('SUM(dana_kebersihan) as total_dana')
        // )
        //     ->groupBy('bulan')
        //     ->get();

        // foreach ($dataKebersihan as $item) {
        //     $item->bulan = Carbon::createFromFormat('Y-m', $item->bulan)->locale('id')->format('F Y');
        // }
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

        return view('penghuni.home', compact('data', 'dataKebersihan', 'jadwalKebersihan', 'dataLaundry'));
    }
}
