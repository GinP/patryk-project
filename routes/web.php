<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/users/{user}/edit', 'HomeController@edit');
Route::patch('/users/{user}/edit', 'HomeController@update');

Route::get('adverts','AdvertController@index');
Route::get('adverts/create','AdvertController@create');
Route::post('adverts','AdvertController@store');
Route::get('adverts/showyour','AdvertController@showyour');
Route::post('adverts/{category}','AdvertController@filter');
Route::get('adverts/{advert}','AdvertController@show');
Route::get('adverts/{advert}/edit','AdvertController@edit');
Route::patch('adverts/{advert}','AdvertController@update');
Route::delete('adverts/{advert}','AdvertController@destroy');

