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

Route::group(['middleware' => 'web'], function() {
	Auth::routes();

	Route::get('/', 'PostController@indexPage');
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('/create', 'PostController@createPage');

	Route::post('/create', 'PostController@createPost');

	Route::get('/post/edit/{id}', 'PostController@editPage')->where(['id' => '[0-9]+']);

	Route::post('/post/edit/{id}', 'PostController@editPost')->where(['id' => '[0-9]+']);

	Route::get('/post/delete/{id}', 'PostController@deletePost')->where(['id' => '[0-9]+']);
});

