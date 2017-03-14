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
Route::resource('files', 'FilesController');
Route::resource('search', 'SearchController');
Route::resource('users', 'UsersController');
Route::resource('contact', 'ContactController');
Route::resource('sitemap', 'SitemapController');
Route::resource('print', 'PrintController');
Route::group(['prefix' => 'service'], function () {
    Route::get('/', 'ServiceController@index');
    Route::post('/check', 'ServiceController@check');
    Route::resource('me', 'UserServiceController');
    Route::resource('document', 'ServiceDocumentController');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'Admin\AdminController@index');

    Route::resource('categories', 'Admin\CategoriesController');
    Route::resource('posts', 'Admin\PostsController');
    Route::resource('files', 'Admin\FilesController');
    Route::resource('services', 'Admin\ServicesController');

});
