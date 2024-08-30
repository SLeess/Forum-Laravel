<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\{SupportEloquentORM, SupportRepositoryInterface};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        //have to do this to the system works, provind the change of the classes using dependencies inversion
        $this->app->bind(
            SupportRepositoryInterface::class,
            SupportEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
