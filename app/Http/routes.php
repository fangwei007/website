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
Route::get('/', 'HomeController@index');

Route::get('/home', function () {
    return redirect('/');
});


Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/trash', 'AdminController@trash');
Route::get('/trash/user/{id}/restore', 'AdminController@restore');
Route::get('/trash/user/{id}/perm-delete', 'AdminController@permDestroy');
Route::get('/trash/item/{id}/restore', 'InstrumentsController@restore');
Route::get('/trash/item/{id}/perm-delete', 'InstrumentsController@permDestroy');
Route::resource('items', 'InstrumentsController');
Route::resource('admin', 'AdminController');
Route::get('/admin/{id}/delete', 'AdminController@destroy');
Route::get('/items/{id}/delete', 'InstrumentsController@destroy');
Route::post('/contact', 'ContactController@store');
Route::get('/user-manage', 'AdminController@userManage');
Route::get('/item-manage', 'AdminController@itemManage');
Route::get('/msg-manage', 'ContactController@msgManage');
Route::get('/msg/{id}', 'ContactController@viewMsg');
Route::post('/msg/{id}', 'ContactController@readMsg');
Route::get('/msg/{id}/delete', 'ContactController@destroy');
Route::get('/trash/msg/{id}/restore', 'ContactController@restore');
Route::post('/news', 'AdminController@addNews');
Route::get('/news/delete/{id}', 'AdminController@deleteNews');

Route::group(["prefix" => "en"], function() {
    Route::get('login', "Auth\EnAuthController@showLoginForm");
    Route::post('login', "Auth\EnAuthController@login");
    Route::get('logout', "Auth\EnAuthController@logout");
    Route::get('register', "Auth\EnAuthController@showRegistrationForm");
    Route::post('register', "Auth\EnAuthController@register");
    Route::get('password/reset/{token?}', "Auth\EnPasswordController@showResetForm");
    Route::post('password/reset', "Auth\EnPasswordController@reset");
    Route::get('password/email', "Auth\EnPasswordController@sendResetLinkEmail");
    
    Route::get('/', 'HomeController@index');

    Route::get('/about', function () {
        return view('about');
    });
    Route::get('/contact', function () {
        return view('contact');
    });

    Route::get('/trash', 'AdminController@trash');
    Route::get('/trash/user/{id}/restore', 'AdminController@restore');
    Route::get('/trash/user/{id}/perm-delete', 'AdminController@permDestroy');
    Route::get('/trash/item/{id}/restore', 'InstrumentsController@restore');
    Route::get('/trash/item/{id}/perm-delete', 'InstrumentsController@permDestroy');
    Route::resource('items', 'InstrumentsController');
    Route::resource('admin', 'AdminController');
    Route::get('/admin/{id}/delete', 'AdminController@destroy');
    Route::get('/items/{id}/delete', 'InstrumentsController@destroy');
    Route::post('/contact', 'ContactController@store');
    Route::get('/user-manage', 'AdminController@userManage');
    Route::get('/item-manage', 'AdminController@itemManage');
    Route::get('/msg-manage', 'ContactController@msgManage');
    Route::get('/msg/{id}', 'ContactController@viewMsg');
    Route::post('/msg/{id}', 'ContactController@readMsg');
    Route::get('/msg/{id}/delete', 'ContactController@destroy');
    Route::get('/trash/msg/{id}/restore', 'ContactController@restore');
    Route::post('/news', 'AdminController@addNews');
    Route::get('/news/delete/{id}', 'AdminController@deleteNews');
});
