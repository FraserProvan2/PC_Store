<?php

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
Route::post('/account/update/details', 'AccountProfileController@update_details');
Route::post('/account/update/password', 'AccountProfileController@update_password');

Route::get('/account/orders', 'AccountOrdersController@index');

/*------------------------------------------------------------------------
| Build a PC
|------------------------------------------------------------------------*/

Route::get('/build', 'BuildPcController@index');
Route::post('/build/create', 'BuildPcController@create');
Route::get('/build/load', 'BuildPcController@load');

Route::get('/build/load', 'BuildPcController@load');
Route::get('/build/view/{id}', 'BuildPcController@view');
Route::get('/build/delete/{id}', 'BuildPcController@delete');

//choose part
Route::get('/list/{part}', 'BuildPcController@list_part');
Route::get('/add/{id}', 'BuildPcController@add_part');
Route::get('/remove/{id}', 'BuildPcController@remove_part');

Route::get('/build/filter/{param}', 'BuildPcController@filter');

Route::get('/add-extra/{type}', 'BuildPcController@add_extra');
Route::get('/reduce-extra/{type}', 'BuildPcController@reduce_extra');

/*------------------------------------------------------------------------
| Cart
|------------------------------------------------------------------------*/

Route::post('/cart/add/part_list', 'CartController@add_partlist');
Route::get('/cart/view', 'CartController@view');
Route::get('/cart/remove/{id}', 'CartController@remove');