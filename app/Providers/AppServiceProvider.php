<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Route::post('/oauth/token', [
            'uses' => '\App\Http\Controllers\Auth\LoginController@Login',
            'as' => 'passport.token',
            'middleware' => 'throttle',
        ]);


    }
}
