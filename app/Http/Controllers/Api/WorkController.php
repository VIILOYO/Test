<?php

namespace App\Http\Controllers\Api;

use App\DTO\User\UpdateUserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\AuthenticationResource;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\UserWorkerResource;
use App\Services\Interfaces\WorkServiceInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    public function __construct(
        public readonly WorkServiceInterface $workService
    )
    {}

    /**
     * @return AnonymousResourceCollection
     */
    public function departments(): AnonymousResourceCollection
    {
        $departments = $this->workService->getDepartments();

        return DepartmentResource::collection($departments);
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function workers(): AnonymousResourceCollection
    {
        return $this->workService->getWorkers();
    }

    /**
     * @param int $id
     * @return UserWorkerResource
     */
    public function worker(int $id)
    {
        $user = $this->workService->findUser($id);

        return UserWorkerResource::make($user);
    }

    /**
     * @return AuthenticationResource
     */
    public function user(): AuthenticationResource
    {
        return AuthenticationResource::make(Auth::user());
    }

    /**
     * @param UpdateUserRequest $request
     * @return void
     */
    public function editUser(UpdateUserRequest $request): void
    {
        $data = UpdateUserData::create($request);

        $this->workService->update($data);
    }
}
