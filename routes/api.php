<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Company', 'prefix' => 'departments'], function() {
	Route::get('index', 'DepartmentController@index');
	Route::get('show/{id}', 'DepartmentController@show');
	Route::post('store', 'DepartmentController@store');
	Route::put('update/{id}', 'DepartmentController@update');
	Route::delete('delete/{id}', 'DepartmentController@destroy');
});

Route::group(['namespace' => 'Company', 'prefix' => 'roles'], function() {
	Route::get('index', 'RoleController@index');
	Route::get('show/{id}', 'RoleController@show');
	Route::post('store', 'RoleController@store');
	Route::put('update/{id}', 'RoleController@update');
	Route::delete('delete/{id}', 'RoleController@destroy');
});

Route::group(['namespace' => 'Company', 'prefix' => 'users'], function() {
	Route::get('index', 'UserController@index');
	Route::get('getCountUser', 'UserController@getCountUser');
	Route::get('show/{id}', 'UserController@show');
	Route::post('store', 'UserController@store');
	Route::put('update/{id}', 'UserController@update');
	Route::delete('delete/{id}', 'UserController@destroy');
});

Route::group(['namespace' => 'Company', 'prefix' => 'workflows'], function() {
	Route::get('index', 'WorkflowController@index');
	Route::get('show/{id}', 'WorkflowController@show');
	Route::post('store', 'WorkflowController@store');
	Route::post('update/{id}', 'WorkflowController@update');
	Route::delete('delete/{id}', 'WorkflowController@destroy');
});