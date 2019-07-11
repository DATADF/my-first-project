<?php

Route::view('/', 'home');

//
Route::view('contact', 'contact');
Route::view('about', 'about');


Route::get('customers', 'CustomersController@List');
Route::post('customers', 'CustomersController@store');
