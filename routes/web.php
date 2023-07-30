<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaranoteController;

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

Route::get('/', [LaranoteController::class, 'index']);


Route::get('/register', [UserController::class, 'registerForm']) -> middleware('guest');
Route::get('/login', [UserController::class, 'loginForm']) -> middleware('guest');
Route::post('/auth/register', [UserController::class, 'signup']);
Route::post('/auth/login', [UserController::class, 'login']);
Route::post('/auth/logout', [UserController::class, 'logout']);

//Note taking related routes

Route::post('/note/create', [LaranoteController::class, 'store']);
Route::post('/note/create/dashboard', [LaranoteController::class, 'store_dashboard']);
Route::put('/note/update/dashboard/{note}', [LaranoteController::class, 'update']);
Route::delete('/delete/{note}', [LaranoteController::class, 'destroy']);
Route::get('/edit/{note}', [LaranoteController::class, 'edit']);
Route::get('/dashboard', [LaranoteController::class, 'dashboard']);
