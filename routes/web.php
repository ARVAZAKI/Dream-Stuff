<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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

Route::get('/',[MainController::class, "index"])->middleware('auth');
Route::post('/', [MainController::class, "addStuff"])->name('addStuff');
Route::get('/delete/{kode}',[MainController::class, "deleteStuff"])->name('deleteStuff');

Route::put('/add/{kode}',[MainController::class, "tambahPemasukan"])->name('pemasukan');
Route::get('/add/{kode}',[MainController::class, "addPemasukan"])->name('pemasukan.add');

Route::get('/login', [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, "login"])->middleware('guest');

Route::get('/register', [RegisterController::class, "index"])->middleware('guest');
Route::post('/register', [RegisterController::class, "register"])->name('register')->middleware('guest');

Route::get('/logout', [LogoutController::class, "logout"])->name('logout')->middleware('auth');
