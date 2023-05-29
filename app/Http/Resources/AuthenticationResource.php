<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class AuthenticationResource extends JsonResource
{
    /**
     * @param $request
     * @return string[]
     */
    public function toArray($request): array
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
            'city' => $this->city,
            'is_finished' => $this->is_finished,
            'phone' => $this->phone,
            'birthday' => $this->birthday,
        ];
    }
}
