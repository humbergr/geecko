<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'HomeController@profileIndex');
Route::get('/profiles', 'HomeController@profilesIndex');
Route::get('/new-profile', 'HomeController@getNewProfile');
Route::post('/new-profile', 'HomeController@postNewProfile');
Route::get('/accounts', 'HomeController@accountIndex');
