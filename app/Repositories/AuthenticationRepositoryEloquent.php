<?php

namespace app\Repositories;


use App\Models\User;
use App\Repositories\Interfaces\AuthenticationRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class AuthenticationRepositoryEloquent extends BaseRepository implements AuthenticationRepositoryInterface
{
    public function model()
    {
        return User::class;
    }
}
