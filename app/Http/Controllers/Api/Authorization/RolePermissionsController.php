<?php

namespace Vanguard\Http\Controllers\Api\Authorization;

use Vanguard\Events\Role\PermissionsUpdated;
use Vanguard\Http\Controllers\Api\ApiController;
use Vanguard\Http\Requests\Role\UpdateRolePermissionsRequest;
use Vanguard\Http\Resources\PermissionResource;
use Vanguard\Repositories\Role\RoleRepository;
use Vanguard\Role;

/**
 * @package Vanguard\Http\Controllers\Api
 */
class RolePermissionsController extends ApiController
{
    /**
     * @var RoleRepository
     */
    private $roles;

    public function __construct(RoleRepository $roles)
    {
        $this->roles = $roles;
        $this->middleware('permission:permissions.manage');
    }

    public function show(Role $role)
    {
        return PermissionResource::collection($role->cachedPermissions());
    }

    /**
     * Update specified role.
     * @param Role $role
     * @param UpdateRolePermissionsRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function update(Role $role, UpdateRolePermissionsRequest $request)
    {
        $this->roles->updatePermissions(
            $role->id,
            $request->permissions
        );

        event(new PermissionsUpdated);

        return PermissionResource::collection($role->cachedPermissions());
    }
}
