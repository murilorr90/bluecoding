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
    Route::resource('users', 'API\UserAPIController')->except(['create', 'edit']);
    Route::get('users/{user}/recommendations', 'API\UserAPIController@recommendations')->name('users.recommendations');
    Route::get('users/{user}/guests', 'API\UserAPIController@showGuests')->name('users.guests');

    Route::resource('reservations', 'API\ReservationAPIController')->except(['create', 'edit']);
    Route::patch('reservations/{reservation}/guest', 'API\ReservationAPIController@addGuest')->name('reservations.guests');
});