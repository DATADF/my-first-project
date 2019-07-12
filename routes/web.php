<?php

Route::view('/', 'home');

//
Route::view('contact', 'contact');
Route::view('about', 'about');


Route::get('customers', 'CustomersController@index');
Route::get('customers/create', 'CustomersController@create');
Route::post('customers', 'CustomersController@store');
Route::get('customers/{customer}', 'CustomersController@show');
Route::get('customers/{customer}/edit', 'CustomersController@edit');
Route::PATCH('customers/{customer}', 'CustomersController@update');
