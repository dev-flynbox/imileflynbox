<?php

namespace Waqarali7\Imilezcart;

use Illuminate\Support\ServiceProvider;

class ImilezcartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'imilezcart');
        $this->publishes([
            __DIR__.'/../migrations/' => database_path('migrations')
        ], 'imilezcart-migrations');
        $this->publishes([
            __DIR__.'/../config/imilezcart.php' => config_path('imilezcart.php'),
        ]);
        $this->publishes([
            __DIR__.'/../config/imile_endpoints.php' => config_path('imile_endpoints.php'),
        ]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/imilezcart.php', 'imilezcart'
        );
        $this->app->bind('imilezcart',function() {
            return new \Waqarali7\Imilezcart\Imilezcart;
        });
    }
}
