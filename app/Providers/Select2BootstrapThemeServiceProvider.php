<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Select2BootstrapThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([base_path('node_modules/select2-bootstrap4-theme/dist/') => public_path('vendor/select2-bootstrap4-theme')], 'public');
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
