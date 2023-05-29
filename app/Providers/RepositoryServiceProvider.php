<?php

namespace App\Providers;

use App\Repositories\AuthenticationRepositoryEloquent;
use App\Repositories\Interfaces\AuthenticationRepositoryInterface;
use App\Repositories\Interfaces\WorkRepositoryInterface;
use App\Repositories\WorkRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $singletons = [
        AuthenticationRepositoryInterface::class => AuthenticationRepositoryEloquent::class,
        WorkRepositoryInterface::class => WorkRepositoryEloquent::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
