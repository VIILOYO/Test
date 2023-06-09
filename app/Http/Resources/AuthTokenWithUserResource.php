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
     * @return array<string, AuthenticationResource>
     */
    public function toArray($request): array
    {
        return [
            'token' => $this->token,
            'user' => AuthenticationResource::make($this->user),
            'password' => $this->password,
        ];
    }
}
