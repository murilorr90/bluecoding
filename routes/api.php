<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
//    Route::get('users', 'API\UsersApiController@list')->name('users.list');
//    Route::post('users', 'API\UsersApiController@list')->name('users.list');
//    Route::get('users', 'API\UsersApiController@list')->name('users.list');
//});
//

Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
    Route::get('users', 'API\UserAPIController@index')->name('users.index');
    Route::post('users', 'API\UserAPIController@store')->name('users.store');
    Route::get('users/{user}', 'API\UserAPIController@show')->name('users.show');
    Route::patch('users/{user}', 'API\UserAPIController@update')->name('users.update');
    Route::delete('users/{user}', 'API\UserAPIController@destroy')->name('users.destroy');
    Route::get('users/{user}/guests', 'API\UserAPIController@showGuests')->name('users.guests');
    Route::get('users/{user}/recommendations', 'API\UserAPIController@recommendations')->name('users.recommendations');


    Route::get('reservations', 'API\ReservationAPIController@index')->name('reservations.index');
    Route::post('reservations', 'API\ReservationAPIController@store')->name('reservations.store');
    Route::get('reservations/{reservation}', 'API\ReservationAPIController@show')->name('reservations.show');
    Route::delete('reservations/{reservation}', 'API\ReservationAPIController@destroy')->name('reservations.destroy');
    Route::patch('reservations/{reservation}/add-guest', 'API\ReservationAPIController@addGuest')->name('reservations.add');
});