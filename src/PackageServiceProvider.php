<?php

namespace KenNebula\AYAPaymentIntegration;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use KenNebula\AYAPaymentIntegration\AYA;

class PackageServiceProvider extends ServiceProvider
{
    public function register() : void 
    {
        // Bind the AYA class to the service container
        $this->app->singleton(AYA::class, function($app) {
            return new AYA();
        });
    }

    public function boot() : void 
    {
        if ($this->app->runningInConsole()) {
            // Example: Publishing configuration file
            $this->publishes([
              __DIR__.'/config/config.php' => config_path('aya.php'),
          ], 'config');
        
          }
    }

}