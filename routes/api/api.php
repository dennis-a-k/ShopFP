<?php

use App\Http\Controllers\API\admin\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/admin/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/admin/logout', [AuthController::class, 'logout']);
    // Route::resource('/survey', SurveyController::class);
    // Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::post('/admin/register', [AuthController::class, 'register']);
Route::post('/admin/login', [AuthController::class, 'login']);
