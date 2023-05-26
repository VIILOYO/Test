<?php

namespace App\Providers;

use App\Services\AuthenticationService;
use App\Services\Interfaces\AuthenticationServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public array $bindings  = [
        AuthenticationServiceInterface::class => AuthenticationService::class,
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
