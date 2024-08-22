<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');})->name('welcome');

Route::get('/login', function () {return view('login');})->name('login');

Route::post('/Logar', [userController::class,'getUser'])->name('Logar');

Route::get('/posts', [userController::class, 'getPosts'])->name('posts');

Route::post('/logout', [App\Http\Controllers\userController::class, 'logout'])->name('logout');

Route::post('/registrar', [App\Http\Controllers\userController::class,'setUser'])->name('registrar');
// Route::post('/criar-post', [PostController::class, 'store'])->name('criarPost');
