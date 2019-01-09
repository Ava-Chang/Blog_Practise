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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('create', 'HomeController@create');

Route::post('create', 'ArticleController@store');

Route::get('post/{id}/edit', 'HomeController@edit');

Route::post('post/{id}/edit', 'ArticleController@edit');

Route::get('post/{id}/delete', 'ArticleController@delete');
