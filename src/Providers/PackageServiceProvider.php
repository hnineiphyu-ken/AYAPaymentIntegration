<?php

namespace kennebula\PaymentIntegration\Providers;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function register() : void 
    {
        
    }

    public function boot() : void 
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
              __DIR__.'/config/config.php' => config_path('aya.php'),
            ], 'config');
        
          }
    }

}