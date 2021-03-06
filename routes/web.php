<?php

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
    return view('welcome');
});

Route::get('/customer','CustomerController@index')->name('customer');
Route::post('/customer','CustomerController@postCustomer')->name('customer');
// Route::delete('/cutomer','CustomerController@index')->name('customer');