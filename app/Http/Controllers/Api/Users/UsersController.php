<?php

namespace Vanguard\Http\Controllers\Api\Users;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Vanguard\Events\User\Banned;
use Vanguard\Events\User\Deleted;
use Vanguard\Events\User\UpdatedByAdmin;
use Vanguard\Http\Controllers\Api\ApiController;
use Vanguard\Http\Filters\UserKeywordSearch;
use Vanguard\Http\Requests\User\CreateUserRequest;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\Http\Resources\UserResource;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Support\Enum\UserStatus;
use Vanguard\User;

/**
 * @package Vanguard\Http\Controllers\Api\Users
 */
class UsersController extends ApiController
{
    /**
     * @var UserRepository
     */
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->middleware('permission:users.manage');

        $this->users = $users;
    }

    /**
     * Paginate all users.
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $users = QueryBuilder::for(User::class)
            ->allowedIncludes(UserResource::allowedIncludes())
            ->allowedFilters([
                AllowedFilter::custom('search', new UserKeywordSearch),
                AllowedFilter::exact('status'),
            ])
            ->allowedSorts(['id', 'first_name', 'last_name', 'email', 'created_at', 'updated_at'])
            ->defaultSort('id')
            ->paginate($request->per_page ?: 20);

        return UserResource::collection($users);
    }

    /**
     * Create new user record.
     * @param CreateUserRequest $request
     * @return UserResource
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->only([
            'email', 'password', 'username', 'first_name', 'last_name',
            'phone', 'address', 'country_id', 'birthday', 'role_id'
        ]);

        $data += [
            'status' => UserStatus::ACTIVE,
            'email_verified_at' => $request->verified ? now() : null
        ];

        $user = $this->users->create($data);

        return new UserResource($user);
    }

    /**
     * Show the info about requested user.
     * @param $id
     * @return UserResource
     */
    public function show($id)
    {
        $user = QueryBuilder::for(User::where('id', $id))
            ->allowedIncludes(UserResource::allowedIncludes())
            ->firstOrFail();

        return new UserResource($user);
    }

    /**
     * @param User $user
     * @param UpdateUserRequest $request
     * @return UserResource
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $data = $request->only([
            'email', 'password', 'username', 'first_name', 'last_name',
            'phone', 'address', 'country_id', 'birthday', 'status', 'role_id'
        ]);

        $user = $this->users->update($user->id, $data);

        event(new UpdatedByAdmin($user));

        // If user status was updated to "Banned",
        // fire the appropriate event.
        if ($this->userIsBanned($user, $request)) {
            event(new Banned($user));
        }

        return new UserResource($user);
    }

    /**
     * Check if user is banned during last update.
     *
     * @param User $user
     * @param Request $request
     * @return bool
     */
    private function userIsBanned(User $user, Request $request)
    {
        return $user->status != $request->status && $request->status == UserStatus::BANNED;
    }

    /**
     * Remove specified user from storage.
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        if ($user->id == auth()->id()) {
            return $this->errorForbidden(__("You cannot delete yourself."));
        }

        event(new Deleted($user));

        $this->users->delete($user->id);

        return $this->respondWithSuccess();
    }
}
