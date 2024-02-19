<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class UserService
 *
 * @package App\Services
 */
class UserService
{
    /**
     * Search user in DB
     *
     * @param int $id
     * @return User
     */
    public function searchUser(int $id): Model
    {
        return User::query()->findOrNew($id);
    }

    /**
     * Register user or update user information
     *
     * @param Request $request
     * @return User
     */
    public function register(Request $request): User
    {
        $user = $this->searchUser($request->get('id', 0));

        $user->fill($request->all());
        $user->save();

        return $user;
    }
}
