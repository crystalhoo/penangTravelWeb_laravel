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

Route::middleware(['jwt.auth', 'can:manage-users'])->group(function() {

});


//NOT SURE put which file (authorisation)
Route::get('/posts/delete', 'PostController@delete')->middleware('can:isAdmin')->name('post.delete');
Route::get('/posts/update', 'PostController@update')->middleware('can:isAdmin')->name('post.update');
Route::get('/posts/create', 'PostController@create')->middleware('can:isAdmin')->name('post.create');
});

//api plan
Route::apiResource('plans', 'PlanController');
Route::apiResource('hotels', 'HotelController');
Route::apiResource('schedules', 'ScheduleController');
Route::post('galleries/media', 'GalleriesApiController@storeMedia')->name('admin.galleries.storeMedia');
Route::apiResource('galleries', 'GalleriesApiController');

//hotel actions
Route::post('/admin/hotel/create',['as' => 'admin.hotels.create', 'uses' => 'HotelController@create']);
Route::post('/admin/hotel/edit',['as' => 'admin.hotels.store', 'uses' => 'HotelController@store']);
Route::put('/admin/hotel/{hotel}',['as' => 'admin.hotels.edit', 'uses' => 'HotelController@edit']);
Route::put('/admin/hotel/{hotel}/edit',['as' => 'admin.hotels.update', 'uses' => 'HotelController@update']);
Route::delete('admin/hotel/delete/{hotel}',['as' => 'admin.hotels.destroy', 'uses' => 'HotelController@destroy']);


//plan actions
Route::post('/admin/plan/create',['as' => 'admin.plans.create', 'uses' => 'PlanController@create']);
Route::post('/admin/plan/edit',['as' => 'admin.plans.store', 'uses' => 'PlanController@store']);
Route::put('/admin/plan/{plan}',['as' => 'admin.plans.edit', 'uses' => 'PlanController@edit']);
Route::put('/admin/plan/{plan}/edit',['as' => 'admin.plans.update', 'uses' => 'PlanController@update']);
Route::delete('admin/plan/delete/{plan}',['as' => 'admin.plans.destroy', 'uses' => 'PlanController@destroy']);

//gallery actions
Route::post('/admin/galleries/create',['as' => 'admin.galleries.create', 'uses' => 'Admin\Api\GalleriesApiController@create']);
// Route::post('/admin/galleries/store',['as' => 'admin.galleries.store', 'uses' => 'Admin\Api\GalleriesApiController@store']);
Route::put('/admin/galleries/{galleries}',['as' => 'admin.galleries.edit', 'uses' => 'Admin\Api\GalleriesApiController@edit']);
Route::put('/admin/galleries/{galleries}/edit',['as' => 'admin.galleries.update', 'uses' => 'Admin\Api\GalleriesApiController@update']);
Route::delete('admin/galleries/delete/{galleries}',['as' => 'admin.galleries.destroy', 'uses' => 'Admin\Api\GalleriesApiController@destroy']);
