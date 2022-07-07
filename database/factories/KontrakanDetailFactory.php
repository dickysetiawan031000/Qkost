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
            'kontrakan_id' => mt_rand(1, 6),
            'nomor' => mt_rand(1, 20),
            'status' => $this->faker->randomElement(['active', 'tidak aktif']),

        ];
    }
}
