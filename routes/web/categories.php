<?php

use App\Http\Controllers\WEB\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin/category',
    'middleware' => 'auth',
], function () {
    Route::get('/list', [CategoriesController::class, 'index'])->name('category.list');
    Route::post('/create', [CategoriesController::class, 'store'])->name('category.store');
    Route::patch('/', [CategoriesController::class, 'update'])->name('category.update');
    Route::delete('/', [CategoriesController::class, 'destroy'])->name('category.destroy');
});
