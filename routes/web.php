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


Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/participate', function () {
    return view('participate');
});

Route::resource('participants', 'ParticipantsController');

Route::resource('periods', 'PeriodsController');

Route::get('excel','ParticipantsController@excel')->name('excel')->middleware("auth");

Route::get('participate/github', 'ParticipantsController@redirectToProvider');
Route::get('participate/github/callback', 'ParticipantsController@handleProviderCallback');
