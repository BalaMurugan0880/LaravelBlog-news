<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\CategoryApiController;
use App\Http\Controllers\API\ModuleApiController;
use App\Http\Controllers\API\CategoryPostsApiController;
use App\Http\Controllers\API\UserApiController;

Use App\Post;
use App\Category;
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
// Route::get('post', function() {
//     // If the Content-Type and Accept headers are set to 'application/json', 
//     // this will return a JSON structure. This will be cleaned up later.
//     return Post::all();
// });


	// Route::apiResource('contacts', 'ContactController');
 // 	Route::apiResource('categories', 'CategoryController');
    Route::apiResource('posts', 'ProjectController', array("as" => "api"));
    Route::apiResource('category', 'CategoryApiController', array("as" => "api"));
    Route::apiResource('mainmodule', 'ModuleApiController', array("as" => "api"));
    Route::apiResource('categoryposts', 'CategoryPostsApiController', array("as" => "api"));
    Route::apiResource('user', 'UserApiController', array("as" => "api"));




//     Route::get('posts/{id}', function($id) {
//     return Post::find($id);
// })
 //    Route::apiResource('pages', 'PageController');
 //    Route::apiResource('module', 'mainModuleController');	
 //    Route::apiResource('galleries', 'GalleryController');
 //    Route::apiResource('user', 'UserTableController');

