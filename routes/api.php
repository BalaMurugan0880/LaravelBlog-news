<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProjectController;
Use App\Post;
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
 //    Route::apiResource('pages', 'PageController');
 //    Route::apiResource('module', 'mainModuleController');	
 //    Route::apiResource('galleries', 'GalleryController');
 //    Route::apiResource('user', 'UserTableController');

