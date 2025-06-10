<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    // PASTIKAN INI DI-COMMENT UNTUK LOCAL:
    
    if (request()->hasHeader('X-Forwarded-Host')) {
        $host = request()->header('X-Forwarded-Host');
        $protocol = request()->header('X-Forwarded-Proto', 'https');
        
        URL::forceRootUrl($protocol . '://' . $host);
        URL::forceScheme($protocol);
    }
    
    if (app()->environment('production') || request()->hasHeader('X-Forwarded-Proto')) {
        URL::forceScheme('https');
    }
    
}

}
