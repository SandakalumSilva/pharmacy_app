<?php

namespace App\Providers;

use App\Interfaces\Backend\CategoryInterface;
use App\Interfaces\Backend\ProductInterface;
use App\Interfaces\Backend\PurchaseInterface;
use App\Interfaces\Backend\SupplierInterface;
use App\Repositories\Backend\CategoryRepositoy;
use App\Repositories\Backend\ProductRepository;
use App\Repositories\Backend\PurchaseRepository;
use App\Repositories\Backend\SupplierRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class,CategoryRepositoy::class);
        $this->app->bind(ProductInterface::class,ProductRepository::class);
        $this->app->bind(SupplierInterface::class,SupplierRepository::class);
        $this->app->bind(PurchaseInterface::class,PurchaseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
