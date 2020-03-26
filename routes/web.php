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

Route::middleware(['guest'])->group(function () {

    Route::get('/', 'MapController@generalView');

});
Route::group(['middleware' => ['auth']], function () {
    //only authorized users can access these routes

Route::get('/index', 'HomeController@index')->name('home');

Route::get('/checkin', 'HomeController@checkin')->name('checkin');
Route::post('/userdata', 'HomeController@userdata')->name('userdata');
Route::post('/senddiagnose', 'HomeController@senddiagnose')->name('senddiagnose');


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/maps','MapController@myPosition');
});

Auth::routes();



Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');



Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);
Route::get('/about', 'HomeController@about')->name('about');;