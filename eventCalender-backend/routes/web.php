<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/auth/google', 'Auth\SocialController@redirectToGoogle');
Route::get('/auth/google/callback', 'Auth\SocialController@handleGoogleCallback');

Route::get('/auth/facebook', 'Auth\SocialController@redirectToFacebook');
Route::get('/auth/facebook/callback', 'Auth\SocialController@handleFacebookCallback');


Route::get('/events/create', 'EventController@create')->name('events.create');


Route::get('/', function () {
    return view('welcome');
});
