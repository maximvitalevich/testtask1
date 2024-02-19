<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\userFactory;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory()->count(5)->create();
    }
}
