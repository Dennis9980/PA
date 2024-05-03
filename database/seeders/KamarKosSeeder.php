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
        KamarKos::create([
            'id_kos' => '29f0f335-05de-11ef-a39e-7c10c927aa13',
            'nomor_kamar' => 'kamar1',
        ]);
    }
}
