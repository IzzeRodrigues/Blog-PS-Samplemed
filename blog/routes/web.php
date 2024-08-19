<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/registrar', function () {
    return view('registrar');
});

Route::post('Logar', [userController::class,'getUser'])->name('Logar');

// Route::post('/criar-post', [PostController::class, 'store'])->name('criarPost');
