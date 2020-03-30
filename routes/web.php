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
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');

Route::get('/admin/settings', 'Admin\SettingsController@index')->name('admin.settings.index');
Route::post('/admin/settings/create', 'Admin\SettingsController@create')->name('admin.settings.create');
Route::get('/admin/settings/$settings.id', 'Admin\SettingsController@show')->name('admin.settings.show');
Route::get('/admin/settings/edit', 'Admin\SettingsController@edit')->name('admin.settings.edit');
Route::post('/admin/settings/update', 'Admin\SettingsController@update')->name('admin.settings.update');
Route::post('/admin/settings/store', 'Admin\SettingsController@store')->name('admin.settings.store');
Route::post('/admin/settings/destroy', 'Admin\SettingsController@destroy')->name('admin.settings.destroy');
Route::get('/admin/settings/massDestroy', 'Admin\SettingsController@massDestroy')->name('admin.settings.massDestroy');

Route::get('/admin/schedules/index', 'Admin\ScheduleController@index')->name('admin.schedules.index');
Route::get('/admin/schedules/create', 'Admin\ScheduleController@create')->name('admin.schedules.create');
Route::get('/admin/schedules/{$schedules}', 'Admin\ScheduleController@show')->name('admin.schedules.show');
Route::get('/admin/schedules/edit', 'Admin\ScheduleController@edit')->name('admin.schedules.edit');
Route::post('/admin/schedules/update', 'Admin\ScheduleController@update')->name('admin.schedules.update');
Route::get('/admin/schedules/store', 'Admin\ScheduleControllerScheduleController@store')->name('admin.schedules.store');
Route::post('/admin/schedules/destroy', 'Admin\ScheduleController@destroy')->name('admin.schedules.destroy');
Route::get('/admin/schedules/massDestroy', 'Admin\ScheduleController@massDestroy')->name('admin.schedules.massDestroy');

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

//schedule admin page
// Route::resource('/admin/schedules', 'HotelController');
// Route::get('/admin/schedules', 'HotelController@index')->name('admin.schedules.index');
// Route::get('/admin/schedules/create',['as' => 'admin.schedules.create', 'uses' => 'HotelController@create']);
// Route::post('/admin/schedules/create',['as' => 'admin.schedules.store', 'uses' => 'HotelController@store']);
// Route::get('/admin/schedulesschedules/{schedules}',['as' => 'admin.schedules.show', 'uses' => 'HotelController@show']);
// Route::get('/admin/schedules/{schedules}',['as' => 'admin.schedules.edit', 'uses' => 'HotelController@edit']);
// Route::put('/admin/schedules/{schedules}/edit',['as' => 'admin.schedules.edit', 'uses' => 'HotelController@store']);
// Route::post('admin/schedules/delete/{schedules}',['as' => 'hotel.delete', 'uses' => 'HotelController@destroy']);



Route::get('/admin/galleries', 'Admin\GalleriesController@index')->name('admin.galleries.index');
Route::get('/admin/galleries', 'Admin\GalleriesController@index')->name('admin.galleries.index');
Route::get('/admin/galleries/create', 'Admin\GalleriesController@create')->name('admin.galleries.create');
Route::get('/admin/galleries/{galleries}', 'Admin\GalleriesController@show')->name('admin.galleries.show');
Route::get('/admin/galleries/edit', 'Admin\GalleriesController@edit')->name('admin.galleries.edit');
Route::post('/admin/galleries/update', 'Admin\GalleriesController@update')->name('admin.galleries.update');
Route::get('/admin/galleries/store', 'Admin\GalleriesController@store')->name('admin.galleries.store');
Route::get('/admin/galleries/storeMedia', 'Admin\GalleriesController@store')->name('admin.galleries.storeMedia');
Route::post('/admin/galleries/destroy', 'Admin\GalleriesController@destroy')->name('admin.galleries.destroy');
Route::get('/admin/galleries/massDestroy', 'Admin\GalleriesController@massDestroy')->name('admin.galleries.massDestroy');

Route::get('/admin/faqs', 'Admin\FaqsController@index')->name('admin.faqs.index');
Route::get('/admin/faqs/create', 'Admin\FaqsController@create')->name('admin.faqs.create');
Route::get('/admin/faqs/{faqs}', 'Admin\FaqsController@show')->name('admin.faqs.show');
Route::get('/admin/faqs/edit', 'Admin\FaqsController@edit')->name('admin.faqs.edit');
Route::post('/admin/faqs/update', 'Admin\FaqsController@update')->name('admin.faqs.update');
Route::get('/admin/faqs/store', 'Admin\FaqsController@store')->name('admin.faqs.store');
Route::post('/admin/faqs/destroy', 'Admin\FaqsController@destroy')->name('admin.faqs.destroy');
Route::get('/admin/faqs/massDestroy', 'Admin\FaqsController@massDestroy')->name('admin.faqs.massDestroy');

// Route::redirect('/home', '/admin');
//
// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
//     Route::get('/', 'HomeController@index')->name('home');
//     // Permissions
//     Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
//     Route::resource('permissions', 'PermissionsController');
//
//     // Roles
//     Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
//     Route::resource('roles', 'RolesController');
//
//     // Users
//     Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
//     Route::resource('users', 'UsersController');
//
//     // Settings
//     Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
//     Route::resource('settings', 'SettingsController');
//
//     // Schedules
//     Route::delete('schedules/destroy', 'ScheduleController@massDestroy')->name('schedules.massDestroy');
//     Route::resource('schedules', 'ScheduleController');
//
//     // Hotels
//     Route::delete('hotels/destroy', 'HotelsController@massDestroy')->name('hotels.massDestroy');
//     Route::post('hotels/media', 'HotelsController@storeMedia')->name('hotels.storeMedia');
//     Route::resource('hotels', 'HotelsController');
//
//     // Galleries
//     Route::delete('galleries/destroy', 'GalleriesController@massDestroy')->name('galleries.massDestroy');
//     Route::post('galleries/media', 'GalleriesController@storeMedia')->name('galleries.storeMedia');
//     Route::resource('galleries', 'GalleriesController');
//
//     // Faqs
//     Route::delete('faqs/destroy', 'FaqsController@massDestroy')->name('faqs.massDestroy');
//     Route::resource('faqs', 'FaqsController');
//
// });



// Route::get('/admin/hotel', 'Admin\Api\HotelController@index')->name('admin.hotels.index');
// Route::get('/admin/hotel/create', 'Admin\Api\HotelController@create')->name('admin.hotels.create');
