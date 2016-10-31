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

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', 'PagesController@showRegisterForm');
Route::post('register', 'PagesController@register');
Route::get('login', 'PagesController@showLoginForm');
Route::post('login', 'PagesController@login');
Route::get('google', 'PagesController@redirectToProvider');
Route::get('googleRegistration', 'PagesController@googleRegistration');
Route::get('users', 'PagesController@showUsers');
Route::get('users/{user}', 'PagesController@showUser');
Route::get('logout', 'PagesController@logout');