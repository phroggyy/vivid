<?php

namespace Phroggyy\Vivid;

use Illuminate\Support\ServiceProvider;

class VividServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'vivid');

        $this->publishes([
            __DIR__.'/config/vivid.php' => config_path('vivid.php'),
        ]);

        $this->publishes([
            __DIR__.'/../dist/vivid.css' => public_path('vendor/vivid.css'),
            __DIR__.'/../dist/vivid.js' => public_path('vendor/vivid.js')
        ], 'public');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/vivid.php', 'vivid');
    }
}