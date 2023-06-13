<?php

namespace App\Providers;

use App\Repositories\Contracts\Events\EventRepositoryInterface;
use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\Repositories\Events\EventRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    protected array $classes = [
        UserRepositoryInterface::class => UserRepository::class,
        EventRepositoryInterface::class => EventRepository::class
    ];


    /**
     * Register services.
     *
     * @return void
     */
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
