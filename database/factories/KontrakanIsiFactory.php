<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KontrakanIsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kontrakan_detail_id' => mt_rand(1, 2),
            'nik' => mt_rand(1000000000, 200000000000),
            'nama' => $this->faker->name()
        ];
    }
}
