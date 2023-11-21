<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Route::get('/admin/admins', [UsersController::class, 'getAdmins'])->name('admins.list');
    // Route::get('/admin/users', [UsersController::class, 'getUsers'])->name('users.list');
    // Route::get('/admin/create_user', [UsersController::class, 'create'])->name('user.create');
    // Route::post('/admin/create_user', [UsersController::class, 'store'])->name('user.store');
    // Route::get('/admin/user/{id}', [UsersController::class, 'show'])->name('user.show');
    // Route::patch('/admin/user/{id}', [UsersController::class, 'update'])->name('user.update');
    // Route::delete('/admin/user', [UsersController::class, 'destroy'])->name('user.destroy');
});
