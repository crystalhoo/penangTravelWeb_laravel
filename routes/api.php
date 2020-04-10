<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*s
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

Route::post('galleries/media', 'GalleriesApiController@storeMedia')->name('admin.galleries.storeMedia');
Route::apiResource('galleries', 'GalleriesApiController');

//gallery actions
Route::post('/admin/galleries/create',['as' => 'admin.galleries.create', 'uses' => 'Admin\Api\GalleriesApiController@create']);
Route::delete('admin/galleries/delete/{galleries}',['as' => 'admin.galleries.destroy', 'uses' => 'Admin\Api\GalleriesApiController@destroy']);
