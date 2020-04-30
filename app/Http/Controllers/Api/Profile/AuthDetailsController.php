<?php

namespace Vanguard\Http\Controllers\Api\Profile;

use Vanguard\Http\Controllers\Api\ApiController;
use Vanguard\Http\Requests\User\UpdateProfileLoginDetailsRequest;
use Vanguard\Http\Resources\UserResource;
use Vanguard\Repositories\User\UserRepository;

/**
 * @package Vanguard\Http\Controllers\Api\Profile
 */
class AuthDetailsController extends ApiController
{
    /**
     * Updates user profile details.
     *
     * @param UpdateProfileLoginDetailsRequest $request
     * @param UserRepository $users
     * @return UserResource
     */
    public function update(UpdateProfileLoginDetailsRequest $request, UserRepository $users)
    {
        $user = $request->user();

        $data = $request->only(['email', 'username', 'password']);

        $user = $users->update($user->id, $data);

        return new UserResource($user);
    }
}
