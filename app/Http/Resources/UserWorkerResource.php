<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class UserWorkerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image,
            'about' => $this->about,
            'type' => $this->type,
            'github' => $this->github,
            'worker' => WorkerResource::make($this),
        ];
    }
}
