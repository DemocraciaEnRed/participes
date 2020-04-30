<?php

namespace Vanguard\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
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
            'updated_at' => (string) $this->updated_at,
            'created_at' => (string) $this->created_at
        ];
    }
}
