<?php

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

//Route::get('/', 'HomeController@index');

Route::get('/','firstController@index')->name('homepage');

Route::post('search','searchController@search')->name('search');

Route::resource('view','viewController');

Route::post('userReservation','userReservationController@reservation')->name('userReservation');

Route::prefix('admin')->group(function () {

Route::resource('index','indexController');

Route::resource('facility','facilityController');

Route::resource('hotel_facility', 'hotelFacilityController');

Route::resource('reservation','reservationController');

Route::get('reservedRoom','reservedRoomController@index')->name('reservedRoom');

Route::resource("rooms", "roomController");

Route::resource("notifications","notificationController");

Route::resource("user","userController");

Route::resource('image', 'hotelImageController');

Route::resource('room_type',"roomTypeController");

Route::get('reset_password','resetPasswordController@index')->name('reset_password');

Route::post('reset_password/update','resetPasswordController@update')->name('password_reset.update');
});

Auth::routes();

Route::get('/home', 'indexController@index')->name('home');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::post('register', 'Auth\RegisterController@register');

Auth::routes();
