<?php

namespace Database\Seeders;

use App\Models\Kos;
use App\Models\Laundry;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'username' => 'user123',
            'password' => Hash::make('12345678'),
            'phone' => '085155370210',
            'address' => 'jember'
        ]);

        Kos::factory(10) // Buat 10 data kos
            ->hasKamarKos(5) // Setiap kos memiliki 5 kamar
            ->create();
    }
}
