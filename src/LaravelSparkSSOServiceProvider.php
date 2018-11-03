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
        
        // load views
        $this->loadViewsFrom(__DIR__.'/views', 'laravel-spark-sso');
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/laravel-spark-sso'),
        ]);
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