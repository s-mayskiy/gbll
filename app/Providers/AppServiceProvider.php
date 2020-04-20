<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('ru_RU');
        });

        view()->composer('layouts.main', function ($view) {

            $avatar = Auth::check() ? Auth::user()->avatar : "";
            $view->with('curUserAavatar', $avatar);
        });
    }
}
