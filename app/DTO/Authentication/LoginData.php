<?php
namespace App\DTO\Authentication;

use Atwinta\DTO\DTO;

class LoginData extends DTO
{
    /**
     * @param string $email
     * @param ?string $password
     */
    public function __construct(
        public readonly string $email,
        public readonly ?string $password,
    )
    {}
}
