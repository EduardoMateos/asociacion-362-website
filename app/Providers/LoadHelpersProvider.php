<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LoadHelpersProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //aqui cargo los helpers del proyecto
        foreach (glob(app_path() . '/app/Helpers/*.php') as $file) {
            require_once($file);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
