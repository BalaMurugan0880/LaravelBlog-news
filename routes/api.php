<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\CategoryApiController;
use App\Http\Controllers\API\ModuleApiController;
use App\Http\Controllers\API\CategoryPostsApiController;
use App\Http\Controllers\API\UserApiController;
use App\Http\Controllers\API\MobileApiController;


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

    Route::apiResource('posts', 'ProjectController', array("as" => "api"));
    Route::apiResource('mobilepost', 'MobileApiController', array("as" => "api"));
    Route::apiResource('category', 'CategoryApiController', array("as" => "api"));
    Route::apiResource('mainmodule', 'ModuleApiController', array("as" => "api"));
    Route::apiResource('categoryposts', 'CategoryPostsApiController', array("as" => "api"));
    Route::apiResource('user', 'UserApiController', array("as" => "api"));






