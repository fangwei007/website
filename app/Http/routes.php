<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
Route::auth();
Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::resource('items', 'InstrumentsController');

Route::resource('admin', 'AdminController');

Route::get('/admin/{id}/delete', 'AdminController@destroy');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/item', function () {
    return view('single_item');
});

Route::get('/home', 'HomeController@index');
