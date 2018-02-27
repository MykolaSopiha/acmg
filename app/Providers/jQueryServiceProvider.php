<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class jQueryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([base_path('node_modules/jquery/dist') => public_path('vendor/jquery')], 'public');
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
