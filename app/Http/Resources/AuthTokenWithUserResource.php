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
    public function toArray($request): array
    {
        return [
            'token' => $this->token->plainTextToken,
            'user' => AuthenticationResource::make($this),
            'password' => $this->password,
        ];
    }
}
