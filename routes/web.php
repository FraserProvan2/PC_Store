<?php

// namespace App\Http\Controllers\Account;

/*------------------------------------------------------------------------
| Main
|------------------------------------------------------------------------*/

//Auth
Auth::routes();
Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);

// Home
Route::get('/', [ 
    'as' => 'home', 
    'uses' => 'controller@index'
]);


Route::get('/account', 'AccountProfileController@index');
Route::get('/account/orders', 'AccountOrdersController@index');

/*------------------------------------------------------------------------
| Build a PC
|------------------------------------------------------------------------*/

Route::get('/build', 'BuildPcController@index');
Route::post('/build/create', 'BuildPcController@create');
Route::get('/build/load', 'BuildPcController@load');

//choose part
Route::get('/select-cpu', 'BuildPcController@select_cpu');

// LAN Rental
Route::get('/lan-rental', 'LanRentalController@index');