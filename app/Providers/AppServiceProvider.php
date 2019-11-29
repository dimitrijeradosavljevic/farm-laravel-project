<?php

namespace App\Providers;

use App\Birth;
use App\Observers\BirthObserver;
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
        Birth::observe(BirthObserver::class);
    }
}
