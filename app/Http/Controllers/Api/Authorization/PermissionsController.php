<?php

namespace Vanguard\Http\Controllers\Api\Authorization;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Vanguard\Http\Controllers\Api\ApiController;
use Vanguard\Http\Requests\Permission\CreatePermissionRequest;
use Vanguard\Http\Requests\Permission\RemovePermissionRequest;
use Vanguard\Http\Requests\Permission\UpdatePermissionRequest;
use Vanguard\Http\Resources\PermissionResource;
use Vanguard\Permission;
use Vanguard\Repositories\Permission\PermissionRepository;

/**
 * @package Vanguard\Http\Controllers\Api\Users
 */
class PermissionsController extends ApiController
{
    /**
     * @var PermissionRepository
     */
    private $permissions;

    public function __construct(PermissionRepository $permissions)
    {
        $this->permissions = $permissions;
        $this->middleware('permission:permissions.manage');
    }

    /**
     * Get all system permissions.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $permissions = QueryBuilder::for(Permission::class)
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::partial('display_name'),
                AllowedFilter::exact('role', 'role_id'),
            ])
            ->allowedSorts(['name', 'created_at'])
            ->defaultSort('created_at')
            ->paginate();

        return PermissionResource::collection($permissions);
    }

    /**
     * Create new permission from request.
     * @param CreatePermissionRequest $request
     * @return PermissionResource
     */
    public function store(CreatePermissionRequest $request)
    {
        $permission = $this->permissions->create(
            $request->only(['name', 'display_name', 'description'])
        );

        return new PermissionResource($permission);
    }

    /**
     * Get info about specified permission.
     * @param Permission $permission
     * @return PermissionResource
     */
    public function show(Permission $permission)
    {
        return new PermissionResource($permission);
    }

    /**
     * Update specified permission.
     * @param Permission $permission
     * @param UpdatePermissionRequest $request
     * @return PermissionResource
     */
    public function update(Permission $permission, UpdatePermissionRequest $request)
    {
        $input = collect($request->all());

        $permission = $this->permissions->update(
            $permission->id,
            $input->only(['name', 'display_name', 'description'])->toArray()
        );

        return new PermissionResource($permission);
    }

    /**
     * Remove specified permission from storage.
     * @param Permission $permission
     * @param RemovePermissionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Permission $permission, RemovePermissionRequest $request)
    {
        $this->permissions->delete($permission->id);

        return $this->respondWithSuccess();
    }
}
