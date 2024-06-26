<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'nama_pembayar' => $this->faker->name,
            'jumlah_bayar' => $this->faker->randomFloat(2, 100000, 1000000),
            'tujuan_bayar' => $this->faker->randomElement(['Laundry', 'Kebersihan', 'Pelunasan Kamar']),
            'jenis_transaksi' => $this->faker->randomElement(['laundry', 'kebersihan', 'pelunasan_kamar', 'booking']),
            'status' => $this->faker->randomElement(['pending', 'berhasil', 'gagal']),
            'tanggal_pembayaran' => $this->faker->date(),

            // Kolom khusus untuk booking (nullable)
            'no_telpon' => $this->faker->optional()->phoneNumber,
            'email' => $this->faker->optional()->email,
            'tgl_masuk' => $this->faker->optional()->date(),
            'tipe_kos' => $this->faker->optional()->randomElement(['Standard', 'Deluxe', 'Suite']),
            'total_harga' => $this->faker->optional()->randomFloat(2, 500000, 2000000),
            'dp' => $this->faker->optional()->randomFloat(2, 100000, 500000),

            // Kolom khusus untuk transaksi selain booking (nullable)
            'no_kamar' => $this->faker->optional()->randomElement(['A101', 'B202', 'C303']),

            'snap_token' => $this->faker->optional()->uuid,
        ];
    }
}
