<?php

namespace App\Http\Resources;

use App\DTO\Authentication\AuthTokenWithUserData;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin AuthTokenWithUserData
 */
class AuthTokenWithUserResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'token' => $this->token,
            'user' => AuthenticationResource::make($this->user),
            'password' => $this->password,
        ];
    }
}
