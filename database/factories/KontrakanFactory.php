<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KontrakanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 2),
            'jenis_kontrakan_id' => mt_rand(1, 2),
            // 'kontrakan_detail_id' => mt_rand(1, 2),
        ];
    }
}
