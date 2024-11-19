<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('signup');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signup', [App\Http\Controllers\UserController::class, 'register']);

Route::get('/listing', [App\Http\Controllers\UserController::class, 'showUsers']);

Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'showUserDetails'])->name('user-details');

Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit-user');
Route::put('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update-user');
Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete-user');




//Route::get('/listing', [UserController::class, 'showUsers'])->name('users.showUsers');

