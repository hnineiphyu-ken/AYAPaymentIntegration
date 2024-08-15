<?php

namespace KenNebula\AYAPaymentIntegration\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function register() : void 
    {
      // $this->app->bind('AYA', function($app) {
      //     return new AYA();  // Create an instance of AYA
      // });
    }

    public function boot() : void 
    {
        AliasLoader::getInstance()->alias('AYA', \KenNebula\AYAPaymentIntegration\AYA::class);
        if ($this->app->runningInConsole()) {
            // Example: Publishing configuration file
            $this->publishes([
              __DIR__.'/../config/config.php' => config_path('aya.php'),
          ], 'config');
        
          }
    }

}