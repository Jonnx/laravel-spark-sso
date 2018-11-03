<?php

namespace Jonnx\LaravelSparkSSO;
use Illuminate\Support\ServiceProvider;

class LaravelSparkSSOServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // load routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        
        // load migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
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