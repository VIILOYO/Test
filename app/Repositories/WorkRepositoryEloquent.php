<?php

namespace App\Repositories;

use App\DTO\User\UpdateUserData;
use App\Models\Department;
use App\Models\User;
use App\Repositories\Interfaces\WorkRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;

class WorkRepositoryEloquent extends BaseRepository implements WorkRepositoryInterface
{
    public function model()
    {
        return Department::class;
    }

    /**
     * @inheritDoc
     */
    public function findUser(int $id): User
    {
        return User::findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function userUpdate(UpdateUserData $data): void
    {
        Auth::user()->update($data->toArray());
    }
}
