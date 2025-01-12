<?php

use App\Http\Controllers\backend\CategoryController;
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
        Route::post('/store/category','storeCategory')->name('store.category');
        Route::get('/edit/category/{id}','editCategory')->name('edit.category');
        Route::post('/update/category','updateCategory')->name('update.category');
        Route::get('/delete/category/{id}','deleteCategory')->name('delete.category');
    });
});
