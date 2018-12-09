<?php

/*------------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------------------*/

// Testing
// Route::get('/save_list', 'PartPickerAlphaController@save_list');
// Route::get('/view_list/{id}/', 'PartPickerAlphaController@view_list');
// Route::get('/view_list/store/{id}/', 'PartPickerAlphaController@view_list');
// Route::get('/view_list/delete/{id}/', 'PartPickerAlphaController@delete_list');

// Home
Route::get('/', 'controller@index');

// Build a PC
Route::get('/build', 'BuildPcController@index');

// LAN Rental
Route::get('/lan-rental', 'LanRentalController@index');