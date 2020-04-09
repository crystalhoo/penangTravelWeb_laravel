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

Route::get('/register', 'RegisterController@create')->name('register');
Route::post('register', 'RegisterController@store')->name('auth.register.store');

Route::post('login', 'Auth\LoginController@login');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');

//hotel admin page
Route::resource('/admin/hotel', 'HotelController');
Route::get('/admin/hotel', 'HotelController@index')->name('admin.hotels.index');

Route::get('/admin/hotel/create',['as' => 'admin.hotels.create', 'uses' => 'HotelController@create']);
Route::get('/admin/hotel/{hotel}',['as' => 'admin.hotels.show', 'uses' => 'HotelController@show']);
Route::put('/admin/hotel/{hotel}/edit',['as' => 'admin.hotels.edit', 'uses' => 'HotelController@edit']);
Route::get('admin/hotel/delete/{hotel}',['as' => 'admin.hotels.destroy', 'uses' => 'HotelController@destroy']);
Route::post('hotel/media', 'HotelsController@storeMedia')->name('admin.hotels.storeMedia');

//plan admin page
Route::resource('/admin/plan', 'PlanController');
Route::get('/admin/plan', 'PlanController@index')->name('admin.plans.index');

Route::get('/admin/plan/create',['as' => 'admin.plans.create', 'uses' => 'PlanController@create']);
Route::get('/admin/plan/{plan}',['as' => 'admin.plans.show', 'uses' => 'PlanController@show']);
Route::put('/admin/plan/{plan}/edit',['as' => 'admin.plans.edit', 'uses' => 'PlanController@edit']);
Route::get('admin/plan/delete/{plan}',['as' => 'admin.plans.destroy', 'uses' => 'PlanController@destroy']);
Route::post('plan/media', 'PlanController@storeMedia')->name('admin.plans.storeMedia');

//gallery admin page
Route::resource('/admin/galleries', 'Admin\GalleriesController');
Route::get('/admin/galleries', 'Admin\GalleriesController@index')->name('admin.galleries.index');

Route::get('/admin/galleries/create', 'Admin\GalleriesController@create')->name('admin.galleries.create');
Route::post('/admin/galleries/store',['as' => 'admin.galleries.store', 'uses' => 'Admin\GalleriesController@store']);
Route::get('/admin/galleries/{gallery}', 'Admin\GalleriesController@show')->name('admin.galleries.show');
Route::post('/admin/galleries/{gallery}/edit', 'Admin\GalleriesController@edit')->name('admin.galleries.edit');
Route::put('/admin/galleries/{galleries}/edit',['as' => 'admin.galleries.update', 'uses' => 'Admin\GalleriesController@update']);
Route::post('galleries/media', 'Admin\GalleriesController@storeMedia')->name('admin.galleries.storeMedia');

//hotel admin page
Route::resource('/admin/hotel', 'HotelController');
Route::get('admin/hotel/delete/{hotel}',['as' => 'hotel.delete', 'uses' => 'HotelController@destroy']);

Route::get('/admin/hotel/{$hotel}', 'Admin\HotelController@show')->name('admin.hotel.show');
Route::get('/admin/hotel/edit', 'Admin\HotelController@edit')->name('admin.hotel.edit');
Route::post('/admin/hotel/update', 'Admin\HotelController@update')->name('admin.hotel.update');
Route::post('/admin/hotel/store', 'Admin\HotelController@store')->name('admin.hotel.store');
Route::post('/admin/hotel/destroy', 'Admin\HotelController@destroy')->name('admin.hotel.destroy');
Route::get('/admin/hotel/massDestroy', 'Admin\HotelController@massDestroy')->name('admin.hotel.massDestroy');


//plan admin page
Route::resource('/admin/plan', 'PlanController');
Route::get('admin/plan/delete/{plan}',['as' => 'plan.delete', 'uses' => 'PlanController@destroy']);

Route::get('/admin/plan/{$plan}', 'Admin\PlanController@show')->name('admin.plan.show');
Route::get('/admin/plan/edit', 'Admin\PlanController@edit')->name('admin.plan.edit');
Route::post('/admin/plan/update', 'Admin\PlanController@update')->name('admin.plan.update');
Route::post('/admin/plan/store', 'Admin\PlanController@store')->name('admin.plan.store');
Route::post('/admin/plan/destroy', 'Admin\PlanController@destroy')->name('admin.plan.destroy');
Route::get('/admin/plan/massDestroy', 'Admin\PlanController@massDestroy')->name('admin.plan.massDestroy');


//schedule admin page
Route::resource('/admin/schedule', 'ScheduleController');
Route::get('admin/schedule/delete/{schedule}',['as' => 'schedule.delete', 'uses' => 'ScheduleController@destroy']);

Route::get('/admin/schedule/{$schedule}', 'Admin\ScheduleController@show')->name('admin.schedule.show');
Route::get('/admin/schedule/edit', 'Admin\ScheduleController@edit')->name('admin.schedule.edit');
Route::post('/admin/schedule/update', 'Admin\ScheduleController@update')->name('admin.schedule.update');
Route::post('/admin/schedule/store', 'Admin\ScheduleController@store')->name('admin.schedule.store');
Route::post('/admin/schedule/destroy', 'Admin\ScheduleController@destroy')->name('admin.schedule.destroy');
Route::get('/admin/schedule/massDestroy', 'Admin\ScheduleController@massDestroy')->name('admin.schedule.massDestroy');
