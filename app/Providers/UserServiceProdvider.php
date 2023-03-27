<?php

namespace App\Providers;

use App\Services\Impl\UserServiceImpl;
use App\Services\UserService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProdvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        UserService::class => UserServiceImpl::class
    ];

    public function provides() : array
    {
        return [UserService::class];
    }

    /**
     * Register services.
     */
    public function register() : void
    {
        //

    }

    /**
     * Bootstrap services.
     */
    public function boot() : void
    {
        //
    }
}
