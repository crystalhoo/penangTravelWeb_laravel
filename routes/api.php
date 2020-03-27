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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//authentication
Route::middleware('api')->namespace('Auth')->prefix('auth')->group(function() {
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::post('me', 'AuthController@me');


//admin
Route::get('/posts/delete', 'PostController@delete')->middleware('can:isAdmin')->name('post.delete');
Route::get('/posts/update', 'PostController@update')->middleware('can:isAdmin')->name('post.update');
Route::get('/posts/create', 'PostController@create')->middleware('can:isAdmin')->name('post.create');
});

//api plan
Route::apiResource('plans', 'PlanController');
Route::apiResource('hotels', 'HotelController');
Route::apiResource('schedules', 'ScheduleController');

 Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {

     // Galleries
     Route::post('galleries/media', 'GalleriesApiController@storeMedia')->name('galleries.storeMedia');
     Route::apiResource('galleries', 'GalleriesApiController');
});