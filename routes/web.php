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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'HomeController@index')->name('home');

Route::get('/checkin', 'HomeController@checkin')->name('checkin');
Route::post('/userdata', 'HomeController@userdata')->name('userdata');
Route::post('/senddiagnose', 'HomeController@senddiagnose')->name('senddiagnose');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');





