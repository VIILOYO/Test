<?php
namespace App\DTO\Authentication;

use App\Models\User;
use Atwinta\DTO\DTO;
use Laravel\Sanctum\PersonalAccessToken;

class AuthTokenWithUserData extends DTO
{
    /**
     * @param PersonalAccessToken $token
     * @param User $user
     * @param string $password
     */
    public function __construct(
        public readonly PersonalAccessToken $token,
        public readonly User $user,
        public readonly string $password
    )
    {}
}
