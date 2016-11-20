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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/calendar', 'CalendarController@index');

Route::get('/profile', 'UserAdminController@show');
Route::post('/profile', 'UserAdminController@update_avatar');


//Admin Routes - Accessible to users with Admin Role
Route::group(['middleware' => 'App\Http\Middleware\CheckRole'], function(){
	Route::get('/create', 'UserAdminController@create');
	Route::post('/user', 'UserAdminController@store');
	Route::get('/user', 'UserAdminController@index');
	Route::delete('/user/{id}', 'UserAdminController@destroy');
	Route::post('/user/{id}', 'UserAdminController@update');

	Route::get('/role', 'UserAdminController@role_index');
});
