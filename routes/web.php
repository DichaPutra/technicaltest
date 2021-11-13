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
    return redirect("login");
});

// custom auth routes
Route::get('login', [CustomAuthController::class, 'index'])->name('login')->middleware(['isLogin']);
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

//admin
Route::middleware([cekAdmin::class])->group(function () {
    Route::get('admin-orderlist', [\App\Http\Controllers\admin\orderlist::class, 'index'])->name('admin.orderlist');
    Route::get('admin-orderlist-add', [\App\Http\Controllers\admin\orderlist::class, 'add'])->name('admin.orderlist.add');
    Route::get('admin-orderentry-view/{orderid}', [\App\Http\Controllers\admin\orderentry::class, 'view'])->name('admin.orderentry.view');
});

//user
Route::middleware([cekUser::class])->group(function () {
    Route::get('user-orderlist', [\App\Http\Controllers\user\orderlist::class, 'index'])->name('user.orderlist');
});

