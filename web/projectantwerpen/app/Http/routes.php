<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('home');
});*/

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::get('/projecten', 'ProjectController@index');

Route::get('/project/{id}', 'IndividualProjectController@index');
Route::get('/projectslist', 'AdminController@index');
Route::get('/project/follow/{id}', 'IndividualProjectController@follow');
