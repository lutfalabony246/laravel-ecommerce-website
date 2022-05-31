<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;

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


        if(request()->is('admin/*'))
        {
            config()->set('fortify.guard','admin');
            config()->set('fortify.home','admin/dashboard');

        }

        if(request()->is('employeer/*'))
        {
            config()->set('fortify.guard','employeer');
            config()->set('fortify.home','');
        }


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
