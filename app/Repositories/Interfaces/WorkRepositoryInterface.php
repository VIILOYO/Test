<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Prettus\Repository\Contracts\RepositoryInterface;

interface WorkRepositoryInterface extends RepositoryInterface
{
    /**
     * @param int $id
     * @return User
     */
    public function findUser(int $id): User;
}
