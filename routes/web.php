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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

//PostsController
Route::resource('posts','PostsController'); //automatically maps route to the functions in PostsController

Auth::routes();

//dashboard routes
Route::get('/dashboard', 'DashboardController@blog');
Route::get('/dashboard/offers', 'DashboardController@offers');

//OffersController
Route::resource('offers','OffersController'); //automatically maps route to the functions in OffersController
