<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\PurchaseController;
use App\Http\Controllers\backend\SupplierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::controller(CategoryController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/all/category', 'allCategory')->name('all.category');
        Route::get('/add/category', 'addCategory')->name('add.category');
        Route::post('/store/category', 'storeCategory')->name('store.category');
        Route::get('/edit/category/{id}', 'editCategory')->name('edit.category');
        Route::post('/update/category', 'updateCategory')->name('update.category');
        Route::get('/delete/category/{id}', 'deleteCategory')->name('delete.category');
    });
});

Route::controller(ProductController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/all/product', 'allProduct')->name('all.product');
        Route::get('/add/product', 'addProduct')->name('add.product');
        Route::post('/store/product', 'storeProduct')->name('store.product');
        Route::get('/edit/product/{id}', 'editproduct')->name('edit.product');
        Route::post('/update/product', 'updateProduct')->name('update.product');
        Route::get('/delete/product/{id}', 'deleteProduct')->name('delete.product');
    });
});

Route::controller(SupplierController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/all/supplier', 'allSupplier')->name('all.supplier');
        Route::get('/add/supplier', 'addSupplier')->name('add.supplier');
        Route::post('/store/supplier', 'storeSupplier')->name('store.supplier');
        Route::get('/edit/supplier/{id}', 'editSupplier')->name('edit.supplier');
        Route::post('/update/supplier', 'updateSupplier')->name('update.supplier');
        Route::get('/delete/supplier/{id}', 'deleteSupplier')->name('delete.supplier');
    });
});

Route::controller(PurchaseController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/all/purchase', 'allPurchase')->name('all.purchase');
        Route::get('/add/purchase', 'addPuchase')->name('add.purchase');
        Route::post('/store/purchase', 'storePurchase')->name('store.purchase');
        Route::get('/edit/purchase/{id}', 'editPurchase')->name('edit.purchase');
        Route::post('/update/purchase', 'updatePurchase')->name('update.purchase');
        Route::get('/delete/purchase/{id}', 'deletePurchase')->name('delete.purchase');
    });
});
