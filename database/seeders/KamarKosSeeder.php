<?php

namespace Database\Seeders;

use App\Models\KamarKos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KamarKosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $tipeKamar = ['tipe_a', 'tipe_b', 'tipe_aac', 'tipe_bac']; // Array tipe kamar
        $jumlahKamar = 6; // Jumlah kamar yang ingin dibuat

        // Buat kamar-kamar
        for ($i = 1; $i <= $jumlahKamar; $i++) {
            KamarKos::create([
                'nomor_kamar' => str_pad($i, 2, '0', STR_PAD_LEFT),
                'tipe' => $tipeKamar[($i - 1) % count($tipeKamar)] // Ambil tipe secara berulang
            ]);
        }
    }
}
