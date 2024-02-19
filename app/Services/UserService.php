<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function searchUser(int $id): User
    {
        return User::query()->findOrNew($id);
    }
    public function register(Request $request): User
    {
        $user = $this->searchUser($request->get('id', 0));

        $user->fill($request->all());
        $user->save();

        return $user;
    }
}
