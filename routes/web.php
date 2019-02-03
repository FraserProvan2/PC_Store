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

//orders
Route::get('/account/orders', 'AccountOrdersController@index');
Route::get('/account/order/{id}', 'AccountOrdersController@view_order');

/*------------------------------------------------------------------------
| Build a PC
|------------------------------------------------------------------------*/

Route::get('/build', 'BuildPcController@index');
Route::post('/build/create', 'BuildPcController@create');
Route::get('/build/load', 'BuildPcController@load');
Route::get('/build/view/{id}', 'BuildPcController@view');
Route::get('/build/delete/{id}', 'BuildPcController@delete');
Route::post('/build/updatename', 'BuildPcController@change_name');

//choose part
Route::get('/list/{part}', 'BuildPcController@list_part');
Route::get('/add/{id}', 'BuildPcController@add_part');
Route::get('/remove/{id}', 'BuildPcController@remove_part');

Route::get('/build/filter/{param}', 'BuildPcController@filter');

Route::get('/add-extra/{type}', 'BuildPcController@add_extra');
Route::get('/reduce-extra/{type}', 'BuildPcController@reduce_extra');

/*------------------------------------------------------------------------
| components
|------------------------------------------------------------------------*/

Route::get('/components', 'ComponentController@index');
Route::get('/components/{type}', 'ComponentController@filter');

/*------------------------------------------------------------------------
| Cart/Shipping/Payment
|------------------------------------------------------------------------*/

//Cart
Route::post('/cart/add/part_list', 'CartController@add_partlist');
Route::get('/cart/add/component/{id}', 'CartController@add_component');
Route::get('/cart/view', 'CartController@view')->name('cart');
Route::get('/cart/remove/{id}', 'CartController@remove');

//Shipping
Route::get('/shipping', 'ShippingController@index')->name('shipping');
Route::post('/shipping/address', 'ShippingController@store_address');

//Payment
Route::get('/payment', 'PaymentController@index')->name('payment');
Route::post('/payment/proceed', 'PaymentController@place_order');

/*------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------*/

Route::get('/admin', 'Admin\AdminController@index')->name('dashboard');

Route::get('/admin/customers', 'Admin\CustomersController@index');

Route::get('/admin/orders', 'Admin\OrdersController@orders');
Route::get('/admin/orders/completed', 'Admin\OrdersController@completed_orders');

Route::get('/admin/inventory', 'Admin\InventoryController@index');