<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class UserCardResource extends JsonResource
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
        ];
    }
}
