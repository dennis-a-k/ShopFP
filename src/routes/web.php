<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/login', function () {
    return view('pages.login');
});
Route::get('/registre', function () {
    return view('pages.registre');
});
