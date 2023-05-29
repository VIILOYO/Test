<?php

namespace App\Services;

use App\DTO\User\UpdateUserData;
use App\Enums\RoleEnum;
use App\Exceptions\PermissionException;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\DepartmentWithWorkersResource;
use App\Http\Resources\UserCardResource;
use App\Models\Department;
use App\Models\User;
use App\Repositories\Interfaces\WorkRepositoryInterface;
use App\Services\Interfaces\WorkServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class WorkService implements WorkServiceInterface
{
    public function __construct(
        public readonly WorkRepositoryInterface $workRepository
    )
    {}

    /**
     * @inheritDoc
     */
    public function getDepartments(): Collection
    {
        return $this->workRepository->all();
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function getWorkers(): AnonymousResourceCollection
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->role == RoleEnum::WORKER) {
            /** @var Department $department */
            $department = $user->getDepartment()->first();
            return UserCardResource::collection($department->users()->paginate());
        } else if ($user->role == RoleEnum::ADMIN) {
            $departments = $this->workRepository->all();
            return DepartmentWithWorkersResource::collection($departments);
        }
        return DepartmentResource::collection($this->getDepartments());
    }

    /**
     * @inheritDoc
     */
    public function findUser(int $id): User
    {
        /** @var User $authUser */
        $authUser = Auth::user();

        $user = $this->workRepository->findUser($id);

        if ($authUser->role == RoleEnum::ADMIN || ($authUser->getDepartment() === $user->getDepartment())) {
            return $user;
        }

        throw new PermissionException();
    }

    /**
     * @inheritDoc
     */
    public function update(UpdateUserData $data): void
    {
        $this->workRepository->userUpdate($data);
    }
}
