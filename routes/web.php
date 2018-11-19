<?php

Route::group(['namespace' => 'Auth'], function() {
	Route::get('/login', [
		'uses' => 'LoginController@getLogin',
		'as' => 'auth.login.login'
	]);

	Route::post('/login', [
		'uses' => 'LoginController@postLogin',
		'as' => 'auth.login.login'
	]);

	Route::get('/register', [
		'uses' => 'RegisterController@get',
		'as' => 'auth.register.register'
	]);

	Route::post('/register', [
		'uses' => 'RegisterController@create',
		'as' => 'auth.register.register'
	]);

	Route::get('/logout', [
		'uses' => 'LogoutController@logout',
		'as' => 'auth.logout.logout'
	]);
});

Route::group(['namespace' => 'Company', 'middleware' => 'auth'], function() {
	Route::get('/', [
		'uses' => 'HomeController@index',
		'as' => 'company.home.index'
	]);

	Route::get('/employee', [
		'uses' => 'EmployeeController@index',
		'as' => 'company.employee.index'
	]);

	Route::get('/department', [
		'uses' => 'DepartmentController@index',
		'as' => 'company.department.index'
	]);

	Route::get('/user', [
		'uses' => 'UserController@index',
		'as' => 'company.user.index'
	]);
});

Route::get('/test', [
	'uses' => 'Company\UserController@index'
]);
