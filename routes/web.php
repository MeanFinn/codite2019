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

Route::get('', 'IndexController@register');
Route::post('', 'GuestsController@store');

Route::get('login', 'IndexController@login')->name('login');
Route::post('login', 'LoginController@login');

Route::get('logout', 'LoginController@logout');

Route::group(['middleware' => 'auth'], function() {
	Route::get('logs', 'IndexController@logs');
	Route::post('logs', 'IndexController@logs');
	Route::get('delete/{id}', 'GuestsController@destroy');
	// Route::get('report', 'ExcelReport@create');
});
