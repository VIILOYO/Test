<?php

namespace App\Services\Interfaces;

use App\DTO\User\UpdateUserData;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface WorkServiceInterface
{
    /**
     * @return Collection
     */
    public function getDepartments(): Collection;

    /**
     * @return AnonymousResourceCollection
     */
    public function  getWorkers(): AnonymousResourceCollection;

    /**
     * @param int $id
     * @return User
     */
    public function findUser(int $id): User;

    /**
     * @param UpdateUserData $data
     * @return void
     */
    public function update(UpdateUserData $data): void;
}
