<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

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
        
        error_reporting(E_ERROR);
        if(env('APP_QUERY_LOG')){
            \DB::enableQueryLog();
        }

        Schema::defaultStringLength(191);
    }
}
