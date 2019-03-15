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

//LoginController 
Route::get('/', 'LoginController@index')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/check', 'LoginController@check');
Route::post('/', 'LoginController@register');
//HomeController
Route::get('/home','HomeController@feed')->name('home');
Route::get('/search','HomeController@search')->name('search');
Route::get('/search/top','HomeController@searchView')->name('search_view');
//ProfileController
Route::get('/profile/{id}/{name}','ProfileController@show');
Route::post('/update_profil_photo','ProfileController@update_profile_photo');