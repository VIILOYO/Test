<?php

namespace App\Http\Controllers\Api;

use App\DTO\Authentication\AuthenticationData;
use App\DTO\Authentication\AuthTokenWithUserData;
use App\DTO\Authentication\LoginData;
use App\DTO\Authentication\RestorePasswordData;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RestoreConfirmRequest;
use App\Http\Requests\RestoreRequest;
use App\Http\Resources\AuthTokenWithUserResource;
use App\Services\Interfaces\AuthenticationServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function __construct(
        public readonly AuthenticationServiceInterface $authenticationService
    )
    {}

    /**
     * @param RegisterRequest $request
     * @return AuthTokenWithUserResource
     */
    public function registration(RegisterRequest $request): AuthTokenWithUserResource
    {
        $data = AuthenticationData::create($request);

        $user = $this->authenticationService->registrationUser($data);

        $token = $user->createToken($user->name);

        $user_dto = AuthTokenWithUserData::create([
            'token' => $token->plainTextToken,
            'user' => $user,
            'password' => $user->getAuthPassword(),
        ]);

        return AuthTokenWithUserResource::make($user_dto);
    }

    /**
     * @param LoginRequest $request
     * @return AuthTokenWithUserResource
     */
    public function login(LoginRequest $request): AuthTokenWithUserResource
    {
        $data = LoginData::create($request);

        $user = $this->authenticationService->findUserByEmail($data);

        Auth::login($user);

        $token = $user->createToken($user->name);

        $user_dto = AuthTokenWithUserData::create([
            'token' => $token->plainTextToken,
            'user' => $user,
            'password' => $user->getAuthPassword(),
        ]);

        return AuthTokenWithUserResource::make($user_dto);
    }

    /**
     * @param RestoreRequest $request
     * @return void
     */
    public function restore(RestoreRequest $request): void
    {
        // Mail::to($user->email)->send(new Feedback());
    }

    /**
     * @param RestoreConfirmRequest $request
     * @return void
     */
    public function restrorePassword(RestoreConfirmRequest $request): void
    {
        $data = RestorePasswordData::create($request);

        $user = $this->authenticationService->findUserByToken($data);

        //$this->authenticationService->ressetPassword($user, $data);
    }
}
