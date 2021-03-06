<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Main\IndexController as MainIndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[MainIndexController::class, 'index'])->name("main");

Route::get('login/', [LoginController::class, 'index'])->name('login');
Route::post('login/', [LoginController::class, 'login']);

Route::get('logout/', [LogoutController::class, 'logout'])->name('logout');

Route::get('register/', [RegisterController::class, 'index'])->name('register');
Route::post('register/', [RegisterController::class, 'register']);

Route::get('user/', [IndexController::class, 'index'])->name("dashboard");


Route::namespace('App\Http\Controllers\User')->group(function(){
    Route::resource('accounts', 'AccountsController', ['only' => ['index', 'create', 'store', 'edit', 'destroy']]);
    Route::resource('transactions', 'TransactionsController', ['only' => ['index', 'create', 'store', 'show', 'update']]);
});

