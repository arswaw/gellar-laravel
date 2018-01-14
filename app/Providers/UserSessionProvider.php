<?php

namespace App\Providers;

use App\UserSessionSingleton;
use Illuminate\Support\ServiceProvider;

class UserSessionProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserSessionSingleton::class, function ($app) {
            return new UserSessionSingleton();
        });
    }
}
