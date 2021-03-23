<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::apiResource('contacts', 'ContactController');

 Route::apiResource('categories', 'CategoryController');
    Route::apiResource('posts', 'PostController');
    Route::apiResource('pages', 'PageController');
    Route::apiResource('module', 'mainModuleController');	
    Route::apiResource('galleries', 'GalleryController');
    Route::apiResource('user', 'UserTableController');

