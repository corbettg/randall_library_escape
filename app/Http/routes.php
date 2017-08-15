<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/login', 'RandallAuthController@login');
Route::get('/authenticate', 'RandallAuthController@authenticate');
Route::get('/logout', 'RandallAuthController@logout');

Route::get('/', 'PagesController@index');
Route::post('/', 'ReservationsController@create');

Route::get('/reservations', 'ReservationsController@index');

Route::get('/sessions', 'SessionsController@index');
Route::post('/sessions', 'SessionsController@create');
Route::post('/sessions/update', 'SessionsController@update');

Route::get('/scheduled_reminders', 'AppointmentController@index');
