<?php

namespace Database\Factories;

use App\Models\Kos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kos>
 */
class KosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Kos::class;
    public function definition()
    {
        return [
            'nama' => $this->faker->company,
            'alamat' => $this->faker->address,
            'jmlh_kamar' => $this->faker->numberBetween(5, 20),
            'fasilitas_laundry' => $this->faker->randomElement(['ada', 'tidak']),
            'fasilitas_kebersihan' => $this->faker->randomElement(['ada', 'tidak']),
        ];
    }
}
