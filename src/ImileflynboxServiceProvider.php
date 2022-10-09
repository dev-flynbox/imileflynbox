<?php

namespace DevFlynbox\Imileflynbox;

use Illuminate\Support\ServiceProvider;

class ImileflynboxServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'imileflynbox');
        $this->publishes([
            __DIR__.'/../migrations/' => database_path('migrations')
        ], 'imileflynbox-migrations');
        $this->publishes([
            __DIR__.'/../config/imileflynbox.php' => config_path('imileflynbox.php'),
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
            __DIR__.'/../config/imileflynbox.php', 'imileflynbox'
        );
        $this->app->bind('imileflynbox',function() {
            return new \DevFlynbox\Imileflynbox\Imileflynbox;
        });
    }
}
