<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;

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

Auth::routes();
Route::get('/', 'Auth\LoginController@adminLogin')->name('adminLogin');

// ROUTE FOR ADMIN ONLY
Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin', 'active', 'check.session'])->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('profile', 'AdminController@profile')->name('profile');
    Route::put('updateProfile', 'AdminController@updateProfile')->name('updateProfile');

    /* Illustrasi Rack */
    Route::resource('illustrasi', 'IlustrasiController');

    /* Employees */
    Route::resource('employee', 'EmployeeController');

    /* Product */
    Route::resource('product', 'ProductController');
    Route::get('product/search/{id}', 'ProductController@search')->name('product.search');

    /* Category Product */
    Route::resource('category', 'CategoryController');

    /* Rack Product */
    Route::resource('rack', 'RackController');

    /* Reseller */
    Route::resource('reseller', 'ResellerController');

    /* Ekspedisi */
    Route::resource('ekspedisi', 'EkspedisiController');

    /* Ekspedisi */
    Route::resource('scan', 'ScanController');
    Route::post('scan-qr', 'ScanController@scan')->name('scan.qr');

    /* User Management */
    Route::resource('user', 'UserController');

    /* Transaction */
    Route::resource('transaction', 'TransactionController');
});
