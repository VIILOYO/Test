<?php

namespace App\Services;

use App\DTO\Authentication\AuthenticationData;
use App\DTO\Authentication\LoginData;
use App\Exceptions\LoginException;
use App\Models\User;
use App\Repositories\Interfaces\AuthenticationRepositoryInterface;
use App\Services\Interfaces\AuthenticationServiceInterface;
use Illuminate\Support\Facades\Hash;

class AuthenticationService implements AuthenticationServiceInterface
{
    public function __construct(
        public readonly AuthenticationRepositoryInterface $authenticationRepository
    )
    {}

    /**
     * @inheritDoc
     */
    public function registrationUser(AuthenticationData $data): User
    {
        $data->password = Hash::make($data->name);

        return $this->authenticationRepository->create([
            'name' => $data->name,
            'email' => $data->email,
            'type' => $data->type,
            'password' => $data->password,
            'github' => $data->github,
            'city' => $data->city,
            'phone' => $data->phone,
            'birthday' => $data->birthday,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function findUser(LoginData $data): User|null
    {
        $user = $this->authenticationRepository->findWhere(['email' => $data->email])->first();

        if (!$user) {
            throw new LoginException();
        }
        return $user;
    }
}