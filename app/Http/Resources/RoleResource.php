<?php

namespace Vanguard\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\QueryBuilder\AllowedInclude;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
            'removable' => (boolean) $this->removable,
            'users_count' => is_null($this->users_count) ? null : (int) $this->users_count,
            'updated_at' => (string) $this->updated_at,
            'created_at' => (string) $this->created_at,
            'permissions' => PermissionResource::collection($this->whenLoaded('permissions')),
        ];
    }

    public static function allowedIncludes()
    {
        return [
            'permissions',
            AllowedInclude::count('users_count')
        ];
    }
}
