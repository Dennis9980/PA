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
    
        // Buat 20 KamarKos
        for ($i = 1; $i <= 20; $i++) {
            KamarKos::create([
                'nomor_kamar' => str_pad($i, 2, '0', STR_PAD_LEFT), // Menambahkan '0' di depan jika nomor kamar < 10
            ]);
        }
    }
}
