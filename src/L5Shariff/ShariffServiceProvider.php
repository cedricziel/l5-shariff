<?php

namespace CedricZiel\L5Shariff;

use Illuminate\Support\ServiceProvider;

/**
 * Class ShariffServiceProvider
 * Registers the Heise Shariff components to your application.
 *
 * @package CedricZiel\L5Shariff
 */
class ShariffServiceProvider extends ServiceProvider
{
    /**
     * Registers routes and templates
     */
    public function boot()
    {
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/../routes.php';
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'shariff');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/shariff'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../config/shariff.php' => config_path('shariff.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/shariff.php', 'shariff'
        );
    }
}
