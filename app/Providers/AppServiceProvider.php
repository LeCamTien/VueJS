<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryEloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(UserRepository::class, UserRepositoryEloquent::class);
    }
}
