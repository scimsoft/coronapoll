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


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

Auth::routes();
Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

Route::middleware(['guest'])->group(function () {

    Route::get('/', 'GuestMapController@index');

});

Route::post('/', ['uses' => 'SymptomController@index']);
//Ajax route to check if username is taken
Route::post('/checkname', ['uses' => 'Auth\LoginController@checkname']);

Route::get('/guestlogin',['uses'=>'Auth\LoginController@loginasguest']);

//One time route to enter user data like age and risk group
Route::get('/checkin', ['uses' =>'CheckInController@checkin'])->name('checkin');
Route::post('/updateuserdata', 'CheckInController@userdata');

//Route to go to symptoms view and add symproms
Route::get('/symptoms', 'SymptomController@index');
Route::post('/create', 'SymptomController@create');

//Map view route

Route::get('/maps', 'SymptomsMapController@myPosition')->name('maps');

Route::get('/lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);
Route::get('/about', 'HomeController@about')->name('about');;