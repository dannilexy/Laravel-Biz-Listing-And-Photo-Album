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

Route::get('/','ListingsController@index');

Auth::routes();

Route::resource('listings', 'ListingsController');

// Route::post('/listings/store', 'ListingsController@store')->name('listing.store');


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/albums', 'AlbumsController@index')->name('albums');
Route::get('/albums/create', 'AlbumsController@create')->name('albums.create');
Route::post('albums/store', 'AlbumsController@store')->name('albums.store');
Route::get('/albums/{id}', 'AlbumsController@show')->name('albums.show');

Route::get('/photos/create/{id}', 'PhotosController@create')->name('photos.create');
Route::post('/photos/store', 'PhotosController@store')->name('photos.store');
Route::get('/photos/{id}', 'PhotosController@show')->name('photos.show');
Route::delete('/photos/{id}', 'PhotosController@destroy')->name('photos.destroy');

