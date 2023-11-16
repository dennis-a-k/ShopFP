<?php

use App\Http\Controllers\WEB\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/admin/admins', [UsersController::class, 'getAdmins'])->name('admins.list');
    Route::get('/admin/users', [UsersController::class, 'getUsers'])->name('users.list');
    // Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
