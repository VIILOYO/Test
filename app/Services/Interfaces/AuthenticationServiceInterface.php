<?php

namespace App\Services\Interfaces;

use App\DTO\Authentication\AuthenticationData;
use App\DTO\Authentication\LoginData;
use App\Models\User;

interface AuthenticationServiceInterface
{
    /**
     * @param AuthenticationData $data
     * @return User
     */
    public function registrationUser(AuthenticationData $data): User;

    /**
     * @param LoginData $data
     * @return User|null
     */
    public function findUser(LoginData $data): User|null;
}
