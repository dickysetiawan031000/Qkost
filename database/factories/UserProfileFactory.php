<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomNumber = rand(1, 100);
        return [
            'user_id' => mt_rand(1, 2),
            'pekerjaan' => $this->faker->jobTitle(),
            'no_telp' => $this->faker->phoneNumber(),
            'ktp_nik' => $this->faker->unique()->randomNumber(16),
            'ktp_image' => "https://picsum.photos/id/{$randomNumber}/200/300",
            'avatar' => "https://picsum.photos/id/{$randomNumber}/200/300",

        ];
    }
}
