<?php

namespace App\Services;

use App\DTO\Authentication\AuthenticationData;
use App\DTO\Authentication\LoginData;
use App\DTO\Authentication\RestorePasswordData;
use App\Exceptions\LoginException;
use App\Exceptions\NotFoundTokenException;
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

        $user = $this->authenticationRepository->create([
            'name' => $data->name,
            'email' => $data->email,
            'type' => $data->type,
            'password' => $data->password,
            'github' => $data->github,
            'city' => $data->city,
            'phone' => $data->phone,
            'birthday' => $data->birthday,
        ]);

        return $this->authenticationRepository->findWhere(['email' => $user->email])->first();
    }

    /**
     * @inheritDoc
     */
    public function findUserByEmail(LoginData $data): User
    {
        $user = $this->authenticationRepository->findWhere(['email' => $data->email])->first();

        if (!$user) {
            throw new LoginException();
        }
        return $user;
    }

    /**
     * @inheritDoc
     */
    public function findUserByToken(RestorePasswordData $data): User
    {
        $user = $this->authenticationRepository->findWhere(['token' => $data->token])->first();

        if (!$user) {
            throw new NotFoundTokenException();
        }
        return $user;
    }

    /**
     * @inheritDoc
     */
    public function restorePassword(User $user, RestorePasswordData $data): void
    {
        $user->update([
            'password' => $data->password,
        ]);
    }
}
