<?php

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

Route::group(['prefix' => 'customers'], function () {
    Route::get('/', 'CustomerController@index')->name('customers.index');
    Route::get('/delete/{id}', 'CustomerController@delete')->name('customers.delete');
    Route::get('/destroy/{id}', 'CustomerController@destroy')->name('customers.destroy');
    Route::get('/create', 'CustomerController@create')->name('customers.create');
    Route::post('/create', 'CustomerController@store')->name('customers.store');
    Route::get('/update/{id}', 'CustomerController@edit')->name('customers.edit');
    Route::post('/update/{id}', 'CustomerController@update')->name('customers.update');
    Route::get('/show/{id}', 'CustomerController@show')->name('customers.show');
    Route::post('/search', 'CustomerController@search')->name('customers.search');
});
