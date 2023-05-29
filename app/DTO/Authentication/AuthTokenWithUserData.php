<?php
namespace App\DTO\Authentication;

use App\Models\User;
use Atwinta\DTO\DTO;
use Laravel\Sanctum\PersonalAccessToken;

class AuthTokenWithUserData extends DTO
{
    /**
     * @param string $token
     * @param User $user
     * @param string $password
     */
    public function __construct(
        public readonly string $token,
        public readonly User $user,
        public readonly string $password
    )
    {}
}
