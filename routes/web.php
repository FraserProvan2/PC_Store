<?php

/*------------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------------------*/

// Home
Route::get('/', 'controller@index');

// Build a PC
Route::get('/build', 'BuildPcController@index');

// LAN Rental
Route::get('/lan-rental', 'LanRentalController@index');