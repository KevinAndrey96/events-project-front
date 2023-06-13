<?php

namespace App\Providers;

use App\UsesCases\Contracts\Events\GetAllEventsUseCaseInterface;
use App\UsesCases\Contracts\Users\IndexUsersUseCaseInterface;
use App\UsesCases\Contracts\Users\StoreUsersUseCaseInterface;
use App\UsesCases\Contracts\Users\ValidateQRUsersUseCaseInterface;
use App\UsesCases\Events\GetAllEventsUseCase;
use App\UsesCases\Users\IndexUsersUseCase;
use App\UsesCases\Users\StoreUsersUseCase;
use App\UsesCases\Users\ValidateQRUsersUseCase;
use Illuminate\Support\ServiceProvider;

class UseCaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    protected array $classes = [
        IndexUsersUseCaseInterface::class => IndexUsersUseCase::class,
        StoreUsersUseCaseInterface::class => StoreUsersUseCase::class,
        GetAllEventsUseCaseInterface::class => GetAllEventsUseCase::class,
        ValidateQRUsersUseCaseInterface::class => ValidateQRUsersUseCase::class
    ];

    public function register()
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
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
