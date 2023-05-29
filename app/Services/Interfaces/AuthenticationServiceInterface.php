<?php

namespace App\Services\Interfaces;

use App\DTO\Authentication\AuthenticationData;
use App\DTO\Authentication\AuthTokenWithUserData;
use App\DTO\Authentication\LoginData;
use App\DTO\Authentication\RestorePasswordData;
use App\Exceptions\LoginException;
use App\Exceptions\NotFoundTokenException;
use App\Models\User;

interface AuthenticationServiceInterface
{
    /**
     * @param AuthenticationData $data
     * @return User
     */
    public function registrationUser(AuthenticationData $data): User;

    /**
     * @param User $user
     * @return AuthTokenWithUserData
     */
    public function tokenResponse(User $user): AuthTokenWithUserData;

    /**
     * @param LoginData $data
     * @throws LoginException
     * @return User
     */
    public function findUserByEmail(LoginData $data): User;

    /**
     * @param RestorePasswordData $data
     * @return User
     *@throws NotFoundTokenException
     */
    public function findUserByToken(RestorePasswordData $data): User;

    /**
     * @param User $user
     * @param RestorePasswordData $data
     * @return void
     */
    public function restorePassword(User $user, RestorePasswordData $data): void;
}
