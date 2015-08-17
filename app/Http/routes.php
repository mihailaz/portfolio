<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// index page
Route::get('/', ['uses' => 'IndexController@index', 'as' => 'home']);

// admin dashboard
Route::group([
	'prefix' => 'admin',
	'middleware' => \App\Http\Middleware\IsAdminCheck::class,
], function () {
	Route::get('/', ['uses' => 'Admin\AdminController@index', 'as' => 'admin.dashboard']);
	Route::resource('category', 'Admin\CategoryController', ['except' => ['index', 'show']]);
	Route::resource('skill', 'Admin\SkillController', ['except' => ['index', 'show']]);
	Route::resource('project', 'Admin\ProjectController', ['except' => ['index', 'show']]);
});

// show contacts
Route::post('/contacts.json', ['uses' => 'ContactsController@show', 'as' => 'contacts']);

// user profile
Route::group(['middleware' => 'auth'], function(){
	Route::get('/profile', 'ProfileController@edit');
	Route::put('/profile', 'ProfileController@update');
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Роуты запроса ссылки для сброса пароля
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Роуты сброса пароля
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Socialite
Route::get('auth/{driver}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{driver}/callback', 'Auth\AuthController@handleProviderCallback');