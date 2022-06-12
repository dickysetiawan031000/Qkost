<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KontrakanDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kontrakan_isi_id' => mt_rand(1, 2),
            'nomor' => mt_rand(1, 2),
            'status' => $this->faker->randomElement(['active', 'tidak aktif']),

        ];
    }
}
