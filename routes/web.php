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

Route::group(['middleware' => 'web', 'auth'], function() {

	Auth::routes();

	Route::get('/', 'PostController@indexPage');

	Route::get('create', 'PostController@createPage');

	Route::post('create', 'PostController@createPost');

	Route::get('post/edit/{id?}', 'PostController@editPage');

	Route::post('post/edit/{id?}', 'PostController@editPost');

	Route::get('post/delete/{id?}', 'PostController@deletePost');
});

