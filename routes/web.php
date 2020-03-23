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


Route::get('/', 'HomeController@index')->name('home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::redirect('/home', '/admin');
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
