<?php

namespace KenNebula\AYAPaymentIntegration\Providers;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function register() : void 
    {
      $this->app->bind('AYA', function($app) {
          return new AYA();  // Create an instance of AYA
      });
      $this->app->alias('AYA', \KenNebula\AYAPaymentIntegration\AYA::class);
    }

    public function boot() : void 
    {
        if ($this->app->runningInConsole()) {
            // Example: Publishing configuration file
            $this->publishes([
              __DIR__.'/../config/config.php' => config_path('aya.php'),
          ], 'config');
        
          }
    }

}