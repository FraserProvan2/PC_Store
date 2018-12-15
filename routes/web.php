<?php

/*------------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------------------*/

Request::all();

// Home
Route::get('/', 'controller@index');

// Build a PC
Route::get('/build', 'BuildPcController@index');
Route::post('/build/create', 'BuildPcController@create');
Route::get('/build/load', 'BuildPcController@load');


Route::get('/select-cpu', 'BuildPcController@select_cpu');


// LAN Rental
Route::get('/lan-rental', 'LanRentalController@index');