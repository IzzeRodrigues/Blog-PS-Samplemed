<?php

use App\Http\Controllers\userController;
use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');})->name('welcome');

Route::get('/login', function () {return view('login');})->name('login');
Route::get('/posts', [userController::class, 'getPosts'])->name('posts');
Route::post('/Logar', [userController::class,'getUser'])->name('Logar');
Route::post('/logout', [userController::class, 'logout'])->name('logout');

Route::get('/registrar', function () {return view('registrar');})->name('registrar');
Route::post('/registro', [userController::class, 'setUser'])->name('registro');

Route::post('/postar', [PostController::class, 'setPost'])->name('criarPost');
// Route::get('/criarPost', function () {return view('criar');})->name('criar');

