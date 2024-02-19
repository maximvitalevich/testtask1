<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\UserResource;
use App\Services\GrantService;
use App\Services\HelperService;
use App\Services\UserService;
use App\Services\UserSessionService;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserAuthenticate
 *
 * @package App\Http\Controllers
 */
class UserAuthenticate extends Controller
{
    /**
     * Main authenticate action
     *
     * @param AuthenticateRequest $request
     * @param GrantService $grant
     * @param UserService $userService
     * @param UserSessionService $session
     * @return JsonResource
     */
    public function authenticate(
        AuthenticateRequest $request,
        GrantService $grant,
        UserService $userService,
        UserSessionService $session): JsonResource
    {
        $requestString = HelperService::requestToStr($request);
        if (!$grant->validate($requestString, $request->get('sig', ''))) {
            return new ErrorResource(null);
        }

        $user = $userService->register($request);
        $session->updateSession($user, $request);

        return new UserResource($user);
    }
}
