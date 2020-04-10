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

Route::get('/', function () {
    return view('home');
});


Route::get('/', 'HomeController@index')->name('home');

Route::post('login', 'Auth\LoginController@login');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//home admin page
Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');

//plan admin page
Route::resource('/admin/plan', 'PlanController');
Route::get('admin/plan/delete/{plan}',['as' => 'plan.delete', 'uses' => 'PlanController@destroy']);

//schedule admin page
Route::resource('/admin/schedule', 'ScheduleController');
Route::get('admin/schedule/delete/{schedule}',['as' => 'schedule.delete', 'uses' => 'ScheduleController@destroy']);

//hotel admin page
Route::resource('/admin/hotel', 'HotelController');
Route::get('admin/hotel/delete/{hotel}',['as' => 'hotel.delete', 'uses' => 'HotelController@destroy']);

//gallery admin page
Route::resource('/admin/galleries', 'Admin\GalleriesController');
Route::get('/admin/galleries', 'Admin\GalleriesController@index')->name('admin.galleries.index');
Route::get('/admin/galleries/create', 'Admin\GalleriesController@create')->name('admin.galleries.create');
Route::post('/admin/galleries/store',['as' => 'admin.galleries.store', 'uses' => 'Admin\GalleriesController@store']);
Route::get('/admin/galleries/{gallery}', 'Admin\GalleriesController@show')->name('admin.galleries.show');
Route::post('/admin/galleries/{gallery}/edit', 'Admin\GalleriesController@edit')->name('admin.galleries.edit');
Route::put('/admin/galleries/{galleries}/edit',['as' => 'admin.galleries.update', 'uses' => 'Admin\GalleriesController@update']);
Route::post('galleries/media', 'Admin\GalleriesController@storeMedia')->name('admin.galleries.storeMedia');
