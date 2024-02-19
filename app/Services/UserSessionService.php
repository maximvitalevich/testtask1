<?php

namespace App\Services;

use App\Models\User;
use App\Models\UsersSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserSessionService
{
    public function searchSession(int $id): UsersSession
    {
        return UsersSession::query()->firstWhere('user_id', '=', $id);
    }

    public function updateSession(User $user, Request $request): bool
    {
        try {
            $session = $this->searchSession($user->id);
            $session->fill(
                [
                    'user_id' => $user->id,
                    'access_token' => $request->get('access_token')
                ]
            );
            $session->save();
        } catch (\Exception $e) {
            Log::info($e);

            return false;
        }

        return true;
    }
}
