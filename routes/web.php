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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::resource('categories', 'CategoriesController');

Route::resource('posts', 'PostsController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\AdminController@index');
    Route::resource('categories', 'Admin\CategoriesController');
    Route::resource('posts', 'Admin\PostsController');
    Route::resource('files', 'Admin\FilesController');
});
