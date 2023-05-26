<?php
namespace App\DTO\Authentication;

use Atwinta\DTO\DTO;

class AuthenticationData extends DTO
{
    /**
     * @param string $name
     * @param string $email
     * @param string $type
     * @param string $github
     * @param string $city
     * @param string $phone
     * @param string $birthday
     * @param ?string $password
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $type,
        public readonly string $github,
        public readonly string $city,
        public readonly string $phone,
        public readonly string $birthday,
        public ?string $password,
    )
    {}
}
