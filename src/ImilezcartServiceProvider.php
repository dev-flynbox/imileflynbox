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
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
