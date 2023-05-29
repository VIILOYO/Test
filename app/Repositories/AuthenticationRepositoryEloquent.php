<?php

namespace App\Repositories;


use App\Models\User;
use App\Repositories\Interfaces\AuthenticationRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class AuthenticationRepositoryEloquent extends BaseRepository implements AuthenticationRepositoryInterface
{
    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }
}
