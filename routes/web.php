<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//User related routes
Route::get('/', [UserController::class, 'homePage'])->name('login');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Post related routes
Route::get('/create-post', [PostController::class, 'showCreatePost'])->middleware('auth');
Route::post('/create-post', [PostController::class, 'createPost'])->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'showSinglePost']);
Route::delete('/posts/{post}', [PostController::class, 'delete']);

//profile related routes
Route::get('/profile/{user:username}', [UserController::class, 'profile']);
