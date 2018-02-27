<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FontAwesomeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([base_path('node_modules/font-awesome') => public_path('vendor/font-awesome')], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
