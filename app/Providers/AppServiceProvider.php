<?php

namespace App\Providers;

use App\Interfaces\Backend\CategoryInterface;
use App\Interfaces\Backend\ExpenseInterface;
use App\Interfaces\Backend\ProductInterface;
use App\Interfaces\Backend\PurchaseInterface;
use App\Interfaces\Backend\SalesInterface;
use App\Interfaces\Backend\StockInterface;
use App\Interfaces\Backend\SupplierInterface;
use App\Interfaces\Pos\PosInterface;
use App\Interfaces\UserInterface;
use App\Repositories\Backend\CategoryRepositoy;
use App\Repositories\Backend\ExpenseRepository;
use App\Repositories\Backend\ProductRepository;
use App\Repositories\Backend\PurchaseRepository;
use App\Repositories\Backend\SalesRepository;
use App\Repositories\Backend\StockRepository;
use App\Repositories\Backend\SupplierRepository;
use App\Repositories\Pos\PosRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class, CategoryRepositoy::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(SupplierInterface::class, SupplierRepository::class);
        $this->app->bind(PurchaseInterface::class, PurchaseRepository::class);
        $this->app->bind(StockInterface::class, StockRepository::class);
        $this->app->bind(ExpenseInterface::class, ExpenseRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(PosInterface::class, PosRepository::class);
        $this->app->bind(SalesInterface::class, SalesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
