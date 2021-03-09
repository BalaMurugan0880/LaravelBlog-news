<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WebsiteController@index')->name('index');
Route::get('category/{slug}', 'WebsiteController@category')->name('category');
Route::get('post/{slug}', 'WebsiteController@post')->name('post');
Route::get('page/{slug}', 'WebsiteController@page')->name('page');
Route::get('contact', 'WebsiteController@showContactForm')->name('contact.show');
Route::post('contact', 'WebsiteController@submitContactForm')->name('contact.submit');

Route::get('posts/get_by_module', 'PostController@get_by_module')->name('admin.category.get_by_module');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/post/upload_ckeditor', 'PostController@upload_ckeditor')->name('upload');
Route::get('admin/post/file_browser', 'PostController@file_browser');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::resource('pages', 'PageController');
    Route::resource('module', 'mainModuleController');	
    Route::resource('galleries', 'GalleryController');
    Route::resource('user', 'UserTableController');
});



