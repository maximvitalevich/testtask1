<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UsersSession;
use Illuminate\Database\Seeder;

class UsersSessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::query()->where('id', '>=', 2)->get(['id']);

        UsersSession::factory()->create();

        /** @var User $user */
        foreach ($users as $user) {
            UsersSession::factory()->create([
                'user_id' => $user->id,
                'access_token' => md5($user->id)
            ]);
        }
    }
}
