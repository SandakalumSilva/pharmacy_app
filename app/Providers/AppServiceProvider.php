<?php

namespace App\Providers;

use App\Interfaces\Backend\CategoryInterface;
use App\Repositories\Backend\CategoryRepositoy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class,CategoryRepositoy::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
