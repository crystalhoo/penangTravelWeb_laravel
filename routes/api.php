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

//giap stuff
// Route::post('schedules', function(Request $request) {
//     $data = $request->all();
//         return Schedule::create([
//              'plan_id' => $data['plan_id'],
//              'day_number' => $data['day_number'],
//              'start_time' => $data['start_time'],
//              'title' => $data['title'],
//              'full_description' => $data['full_description']
//         ]);
// });
//NOT SURE put which file (authorisation)
//Grace do part
// Route::get('/posts/delete', 'PostController@delete')->middleware('can:isAdmin')->name('post.delete');
// Route::get('/posts/update', 'PostController@update')->middleware('can:isAdmin')->name('post.update');
// Route::get('/posts/create', 'PostController@create')->middleware('can:isAdmin')->name('post.create');
 });

//api plan
// Route::apiResource('plans', 'PlanController');
// Route::apiResource('hotels', 'HotelController');
// Route::apiResource('schedules', 'ScheduleController');


 Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {

    Route::get('/', 'HomeController@index')->name('home');
     // Galleries
     Route::post('galleries/media', 'GalleriesApiController@storeMedia')->name('galleries.storeMedia');
     Route::apiResource('galleries', 'GalleriesApiController');
});

// Route::post('galleries','GalleriesApiController@store')->name('galleries');
// Route::post('/admin/schedule/create',['as' => 'admin.schedules.create', 'uses' => 'ScheduleController@create']);
// Route::post('/admin/schedule/edit',['as' => 'admin.schedules.store', 'uses' => 'ScheduleController@store']);
// Route::post('/admin/schedule/{schedule}',['as' => 'admin.schedules.edit', 'uses' => 'ScheduleController@edit']);
// Route::post('/admin/schedule/{schedule}/edit',['as' => 'admin.schedules.update', 'uses' => 'ScheduleController@update']);
// Route::delete('admin/schedule/delete/{schedule}',['as' => 'admin.schedules.destroy', 'uses' => 'ScheduleController@destroy']);

