<?php

use App\Http\Controllers\WEB\GoodsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin/product',
    'middleware' => 'auth',
], function () {
    Route::get('/list', [GoodsController::class, 'index'])->name('product.list');
    Route::get('/create', [GoodsController::class, 'create'])->name('product.create');
    Route::post('/create', [GoodsController::class, 'store'])->name('product.store');
    Route::get('/{id}', [GoodsController::class, 'show'])->name('product.show');
    Route::patch('/{id}', [GoodsController::class, 'update'])->name('product.update');
    Route::delete('/{id}', [GoodsController::class, 'destroy'])->name('product.destroy');
});
