<?php

namespace Database\Factories;

use App\Models\Kos;
use App\Models\KamarKos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KamarKos>
 */
class KamarKosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = KamarKos::class;
    public function definition()
    {
        return [
            'id_kos' => Kos::factory(), 
            'nomor_kamar' => $this->faker->unique()->numberBetween(101, 305), 
        ];
    }
}
