<?php

namespace KenNebula\AYAPaymentIntegration\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use KenNebula\AYAPaymentIntegration\AYA;

class PackageServiceProvider extends ServiceProvider
{
    public function register() : void 
    {
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