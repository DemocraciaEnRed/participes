<?php

namespace Vanguard\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => (int) $this->user_id,
            'ip_address' => $this->ip_address,
            'user_agent' => $this->user_agent,
            'browser' => $this->browser,
            'platform' => $this->platform,
            'device' => $this->device,
            'last_activity' => (string) $this->last_activity
        ];
    }
}
