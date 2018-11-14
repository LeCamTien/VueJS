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