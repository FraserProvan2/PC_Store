<?php

/*------------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------------------*/

// Testing
Route::get('/', 'PartPickerAlphaController@index');
Route::get('/save_list', 'PartPickerAlphaController@save_list');
Route::get('/view_list/{id}/', 'PartPickerAlphaController@view_list');
Route::get('/view_list/store/{id}/', 'PartPickerAlphaController@view_list');
Route::get('/view_list/delete/{id}/', 'PartPickerAlphaController@delete_list');

