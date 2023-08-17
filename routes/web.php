<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    return view('module.select_login');
})->name('select_login');

////////// USER //////////
Route::controller(UserAuthController::class)->group(function () {
    Route::get('/register/form/', 'registerForm')->name('register.form');
    Route::post('/register', 'register')->name('user.register');
    Route::get('/verify/{token}', 'verify')->name('user.verify.email');
    Route::get('/user/login', 'getLogin')->name('user.login');
    Route::post('/user/authenticate', 'authenticate')->name('user.authenticate');
    Route::any('/user/logout', 'logout')->name('user.logout');
});

Route::group(['middleware' => 'auth:user'], function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/user/dashboard', 'dashboard')->name('user.dashboard');
        Route::get('/user/profile', 'profile')->name('user.profile');
        Route::put('/user/profile/update/{user}', 'update')->name('user.profile.update');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/user/product', 'userPoduct')->name('user.product');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('/user/order', 'index')->name('user.order');
        Route::get('/user/order/history', 'orderHistory')->name('user.order.history');
        Route::post('/user/order/create/{product}', 'store')->name('user.order.create');
        Route::put('/user/order/cancel/{order}', 'cancel')->name('user.order.cancel');
        Route::put('/user/order/upload/{order}', 'upload')->name('user.order.upload');
        Route::get('/users/excel/export/', 'excel_export')->name('user.excel.export');
    });
});


////////// ADMIN //////////
Route::controller(AdminAuthController::class)->group(function () {
    Route::get('/admin/login', 'getLogin')->name('admin.login');
    Route::post('/admin/authenticate', 'authenticate')->name('admin.authenticate');
    Route::any('/admin/logout', 'logout')->name('admin.logout');
});

Route::group(['middleware' => 'auth:admin'], function () {
    // Admin
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('product');
        Route::post('/product/store', 'store')->name('product.store');
        Route::put('/product/update/{product}', 'update')->name('product.update');
        Route::delete('/product/delete/{product}', 'destroy')->name('product.delete');
    });
});