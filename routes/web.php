<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('signup');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signup', [App\Http\Controllers\UserController::class, 'register']);
