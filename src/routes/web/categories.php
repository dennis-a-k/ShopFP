<?php

use App\Http\Controllers\WEB\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin/category',
    'middleware' => 'auth',
], function () {
    Route::get('/list', [CategoriesController::class, 'index'])->name('category.list');
    Route::get('/create', [CategoriesController::class, 'create'])->name('category.create');
    Route::post('/create', [CategoriesController::class, 'store'])->name('category.store');
    Route::get('/{id}', [CategoriesController::class, 'show'])->name('category.show');
    Route::patch('/{id}', [CategoriesController::class, 'update'])->name('category.update');
    Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('category.destroy');
});
