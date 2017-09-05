<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        /*$kernel = app()->make('Illuminate\Contracts\Http\Kernel');
        $kernel->pushMiddleware(\App\Http\Middleware\EncryptCookies::class);
        $kernel->pushMiddleware(\Illuminate\Session\Middleware\StartSession::class);*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
