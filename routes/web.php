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
    Route::post('admin-orderlist-search', [\App\Http\Controllers\admin\orderlist::class, 'search'])->name('admin.orderlist.search');
    Route::get('admin-orderlist-add', [\App\Http\Controllers\admin\orderlist::class, 'add'])->name('admin.orderlist.add');
    Route::post('admin-orderlist-save', [\App\Http\Controllers\admin\orderlist::class, 'save'])->name('admin.orderlist.save');
    Route::get('admin-orderlist-delete/{id}', [\App\Http\Controllers\admin\orderlist::class, 'delete'])->name('admin.orderlist.delete');
    Route::get('admin-orderentry-view/{orderid}', [\App\Http\Controllers\admin\orderentry::class, 'view'])->name('admin.orderentry.view');
    Route::post('admin-orderentry-add', [\App\Http\Controllers\admin\orderentry::class, 'add'])->name('admin.orderentry.add');
    Route::get('admin-orderentry-delete/{id}', [\App\Http\Controllers\admin\orderentry::class, 'delete'])->name('admin.orderentry.delete');
});

//user
Route::middleware([cekUser::class])->group(function () {
    Route::get('user-orderlist', [\App\Http\Controllers\user\orderlist::class, 'index'])->name('user.orderlist');
    Route::post('user-orderlist-search', [\App\Http\Controllers\user\orderlist::class, 'search'])->name('user.orderlist.search');
    Route::get('user-orderlist-add', [\App\Http\Controllers\user\orderlist::class, 'add'])->name('user.orderlist.add');
    Route::post('user-orderlist-save', [\App\Http\Controllers\user\orderlist::class, 'save'])->name('user.orderlist.save');
    Route::get('user-orderlist-delete/{id}', [\App\Http\Controllers\user\orderlist::class, 'delete'])->name('user.orderlist.delete');
    Route::get('user-orderentry-view/{orderid}', [\App\Http\Controllers\user\orderentry::class, 'view'])->name('user.orderentry.view');
    Route::post('user-orderentry-add', [\App\Http\Controllers\user\orderentry::class, 'add'])->name('user.orderentry.add');
    Route::get('user-orderentry-delete/{id}', [\App\Http\Controllers\user\orderentry::class, 'delete'])->name('user.orderentry.delete');
});

