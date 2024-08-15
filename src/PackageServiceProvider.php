<?php

namespace KenNebula\AYAPaymentIntegration;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function register() : void 
    {
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