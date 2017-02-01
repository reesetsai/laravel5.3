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

Route::group(['middleware' => ['web']], function() {
	Route::get('/', 'Home\IndexController@index');
	Route::get('/article/{art_id}', 'Home\IndexController@article');
	Route::get('/category/{keyword}', 'Home\IndexController@category');
	Route::post('/search', 'Home\IndexController@search');
	Route::get('/about', 'Home\IndexController@about');
	Route::get('/cate/{type}', 'Home\IndexController@cate');

	Route::get('admin/code', 'Admin\LoginController@code');
    Route::any('admin/login', 'Admin\LoginController@Login');
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
