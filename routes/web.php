<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','namespace'=>'Admin','middleware' => ['web']], function() {
	Route::get('code', 'LoginController@code');
    Route::any('login', 'LoginController@Login');
});
Route::group(['prefix' => 'admin','namespace'=>'Admin','middleware' => ['web','admin.login']], function() {
   	Route::get('index', 'IndexController@index');
	Route::get('info', 'IndexController@info');
	Route::get('logout', 'LoginController@logout');
	Route::any('password', 'LoginController@changepassword');

	Route::post('cate/changeorder', 'CategoryController@changeOrder');
	Route::resource('category','CategoryController');

	Route::resource('article','ArticleController');
	Route::resource('links','LinksController');
	Route::resource('navs', 'NavsController');
	Route::resource('config', 'ConfigController');
	Route::post('config/changeorder','ConfigController@changeOrder');
	Route::post('config/changecontent','ConfigController@changeContent');
	
	Route::get('conf/putfile','ConfigController@putFile');
	
	Route::post('links/changeorder', 'LinksController@changeOrder');

	Route::any('upload', 'CommonController@upload');
});
