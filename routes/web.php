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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/users/@me/edit', 'HomeController@edit')->name('users.edit');
    Route::patch('/users/@me/edit', 'HomeController@update')->name('users.update');
    Route::get('/users/@me/adverts','HomeController@adverts')->name('users.adverts');

    Route::get('/adverts/create','AdvertController@create')->name('adverts.create');
    Route::post('/adverts','AdvertController@store')->name('adverts.store');
    Route::get('/adverts/{advert}/edit','AdvertController@edit')->name('adverts.edit');
    Route::patch('/adverts/{advert}','AdvertController@update')->name('adverts.update');
    Route::delete('/adverts/{advert}','AdvertController@destroy')->name('adverts.destroy');
});

Route::get('/adverts','AdvertController@index')->name('adverts');
Route::get('/categories/{category}','AdvertController@filter')->name('categories.filter');
Route::get('/adverts/{advert}','AdvertController@show')->name('adverts.show');

