<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NestedsetbieServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\Nestedsetbie', function ($app) {
          return new Nestedsetbie();
        });
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


