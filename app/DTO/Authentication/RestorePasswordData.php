<?php
namespace App\DTO\Authentication;

use Atwinta\DTO\DTO;

class RestorePasswordData extends DTO
{
    /**
     * @param string $token
     * @param string $password
     * @param string $password_confirmation
     */
    public function __construct(
        public readonly string $token,
        public readonly string $password,
        public readonly string $password_confirmation,
    )
    {}
}
