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

Route::auth();

Route::group([ 'middleware' => 'web' ], function() {
	Route::get('/vote', 'IndividualProjectController@voten');
	Route::get('/home', 'HomeController@index');
	Route::get('/', 'HomeController@index');
	Route::get('/projecten', 'ProjectController@index');
	Route::post('/projecten/filter', 'ProjectController@filter');
	Route::get('/projectslist', 'AdminController@index');
	Route::post('/projectslist/addproject', 'AdminController@addProject');
	Route::get('/project/addproject', 'AdminController@addProject');
	Route::get('/project/{id}', 'IndividualProjectController@index');
	Route::get('/project/follow/{id}', 'IndividualProjectController@follow');
	Route::get('/project/unfollow/{id}', 'IndividualProjectController@unfollow');
	Route::post('/reactie/{id}', 'IndividualProjectController@placeComment');
	Route::get('/search', 'SearchController@index');
});


Route::group(['prefix' =>'api'], function()
{
	Route::get('/projects' , 'APIController@requestProjects');
	Route::post('/login', 'APIController@login');
	Route::post('/register' , 'APIController@register');
	Route::get('/comments', 'APIController@getComments');
    Route::group(['middleware' => ['jwt.auth', 'jwt.refresh']], function() {
    	Route::post('/logout', 'APIController@logout');
    });    
});