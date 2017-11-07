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


Route::get('/', 'HomeController@index'); //run the function index of the homecontroller on '/' url

Auth::routes(); //routes for authentication

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth'); // on url '/dashboard' return dashboard.template, u need authentication for this.

Route::get('/participate', function () {
    return view('participate');
});// onr url "/participate' return template participate.template

Route::resource('participants', 'ParticipantsController'); //resource routes for Participants (include create/store/delete/update)

Route::resource('periods', 'PeriodsController'); //resource routes for Periods (include create/store/delete/update)

Route::resource('adminmail', 'AdminMailController'); //resource routes for AdminMail (include create/store/delete/update)

Route::get('excel','ParticipantsController@excel')->name('excel')->middleware("auth"); //create excel file from participants (authentication needed)

Route::get('participate/github', 'ParticipantsController@redirectToProvider');//OAuth
Route::get('participate/github/callback', 'ParticipantsController@handleProviderCallback'); //OAuth
