<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
//middleware
use App\Http\Middleware\cekAdmin;
use App\Http\Middleware\cekUser;

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

// set landing page awal 
Route::get('/', function () {
    return view('welcome');
});

// custom auth routes

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//admin
Route::middleware([cekAdmin::class])->group(function () {
    Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
});

//user
Route::middleware([cekAdmin::class])->group(function () {
    Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
});

