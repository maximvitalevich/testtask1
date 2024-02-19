<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class usersSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'access_token' => '07b38cd0e778340eb40b25e005476ce8'
        ];
    }
}
