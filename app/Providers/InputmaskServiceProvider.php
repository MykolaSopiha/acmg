<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InputmaskServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([base_path('vendor/robinherbots/jquery.inputmask/dist/min/') => public_path('vendor/inputmask')], 'public');
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
