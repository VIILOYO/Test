<?php

namespace App\DTO\User;

use Atwinta\DTO\DTO;

class UpdateUserData extends DTO
{
    /**
     * @param string $name
     * @param string $about
     * @param string $image
     * @param string $github
     * @param string $city
     * @param bool $is_finished
     * @param string $phone
     * @param string $birthday
     */
    public function __construct(
        public readonly string $name,
        public readonly string $about,
        public readonly string $image,
        public readonly string $github,
        public readonly string $city,
        public readonly bool $is_finished,
        public readonly string $phone,
        public readonly string $birthday,
    )
    {}
}
