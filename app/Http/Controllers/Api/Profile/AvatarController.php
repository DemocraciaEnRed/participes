<?php

namespace Vanguard\Http\Controllers\Api\Profile;

use Illuminate\Http\Request;
use Vanguard\Events\User\ChangedAvatar;
use Vanguard\Http\Controllers\Api\ApiController;
use Vanguard\Http\Requests\User\UploadAvatarRawRequest;
use Vanguard\Http\Resources\UserResource;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Services\Upload\UserAvatarManager;

/**
 * @package Vanguard\Http\Controllers\Api\Profile
 */
class AvatarController extends ApiController
{
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @var UserAvatarManager
     */
    private $avatarManager;

    public function __construct(UserRepository $users, UserAvatarManager $avatarManager)
    {
        $this->users = $users;
        $this->avatarManager = $avatarManager;
    }

    /**
     * @param UploadAvatarRawRequest $request
     * @return UserResource
     */
    public function update(UploadAvatarRawRequest $request)
    {
        $name = $this->avatarManager->uploadAndCropAvatar(
            $request->file('file')
        );

        $user = $this->users->update(
            auth()->id(),
            ['avatar' => $name]
        );

        event(new ChangedAvatar);

        return new UserResource($user);
    }

    /**
     * @param Request $request
     * @return UserResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateExternal(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url'
        ]);

        $this->avatarManager->deleteAvatarIfUploaded(
            auth()->user()
        );

        $user = $this->users->update(
            auth()->id(),
            ['avatar' => $request->url]
        );

        event(new ChangedAvatar);

        return new UserResource($user);
    }

    /**
     * Remove avatar for currently authenticated user and set it to null.
     * @return UserResource
     */
    public function destroy()
    {
        $user = auth()->user();

        $this->avatarManager->deleteAvatarIfUploaded($user);

        $user = $this->users->update(
            $user->id,
            ['avatar' => null]
        );

        event(new ChangedAvatar);

        return new UserResource($user);
    }
}
