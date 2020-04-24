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

Route::get('/', 'OfferController@latest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('offers', 'OfferController');

Route::resource('profile', "ProfileController");

Route::resource('profile.rating', "Profile\RatingController");

//Route::get('/profile/{profile}', 'ProfileController@show');

Route::resource('offers.assignments', 'Offer\AssignmentController');


Route::get('offers.index', 'OfferController@index');

//Route::get('profile/{id}', 'ProfileController@show');
