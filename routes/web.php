<?php

/*------------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------------------*/

// Home
Route::get('/', 'controller@index');

// Build a PC
Route::get('/build', 'BuildPcController@index');
Route::get('/select-cpu', 'BuildPcController@select_cpu');


// LAN Rental
Route::get('/lan-rental', 'LanRentalController@index');