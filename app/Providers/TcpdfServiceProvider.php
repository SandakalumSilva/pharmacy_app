<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCPDF;

class TcpdfServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(TCPDF::class, function ($app) {
            return new TCPDF();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
