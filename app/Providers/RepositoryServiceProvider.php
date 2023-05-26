<?php

namespace App\Providers;

use App\Repositories\AuthenticationRepositoryEloquent;
use App\Repositories\Interfaces\AuthenticationRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $singletons = [
        AuthenticationRepositoryInterface::class => AuthenticationRepositoryEloquent::class,
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
