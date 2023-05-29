<?php

namespace App\Http\Controllers\Api;

use App\DTO\Authentication\AuthenticationData;
use App\DTO\Authentication\LoginData;
use App\DTO\Authentication\RestorePasswordData;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RestoreConfirmRequest;
use App\Http\Requests\RestoreRequest;
use App\Http\Resources\AuthTokenWithUserResource;
use App\Mail\ResetPassword;
use App\Models\User;
use App\Services\Interfaces\AuthenticationServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $user_dto = $this->authenticationService->tokenResponse($user);

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

        $user_dto = $this->authenticationService->tokenResponse($user);

        return AuthTokenWithUserResource::make($user_dto);
    }

    /**
     * @param RestoreRequest $request
     * @return void
     */
    public function restore(RestoreRequest $request): void
    {
        /** @var User $user */
        $user = Auth::user();

        Mail::to($user->email)->send(new ResetPassword());
    }

    /**
     * @param RestoreConfirmRequest $request
     * @return void
     */
    public function restorePassword(RestoreConfirmRequest $request): void
    {
        $data = RestorePasswordData::create($request);

        $user = $this->authenticationService->findUserByToken($data);

        $this->authenticationService->restorePassword($user, $data);
    }
}
