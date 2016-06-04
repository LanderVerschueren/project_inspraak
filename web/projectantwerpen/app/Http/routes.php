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
	Route::get('/vote/like/{id}', 'IndividualProjectController@vote_like');
	Route::get('/vote/dislike/{id}', 'IndividualProjectController@vote_dislike');
	Route::get('/home', 'HomeController@index');
	Route::get('/', 'HomeController@index');
	Route::get('/projecten', 'ProjectController@index');
	Route::post('/projecten/filter', 'ProjectController@filter');
	Route::get('/projectslist', 'AdminController@index');
	Route::get('/project/addproject', 'AdminController@addProject');
	Route::get('/project/update/{id}','AdminController@updateProject');
	Route::get('/project/{id}', 'IndividualProjectController@index');
	Route::get('/project/delete/{id}', 'AdminController@delete_project');
	Route::get('/project/follow/{id}', 'IndividualProjectController@follow');
	Route::get('/project/unfollow/{id}', 'IndividualProjectController@unfollow');
	Route::post('/reactie/{id}', 'IndividualProjectController@placeComment');
	Route::get('/search', 'SearchController@index');
	Route::post('/add_project', 'AdminController@add');
	Route::post('/update_project/{id}', 'AdminController@update');
});


Route::group(['prefix' =>'api'], function()
{
	Route::get('/projects' , 'APIController@requestProjects');
	Route::post('/login', 'APIController@login');
	Route::post('/register' , 'APIController@register');
	Route::get('/comments/{id}', 'APIController@getComments');
	Route::post('/comments/place/{id}', 'APIController@placeComment');
	Route::get('/like/{id}' , 'APIController@vote_like');
	Route::get('/dislike/{id}' , 'APIController@vote_dislike');
    Route::group(['middleware' => 'jwt.auth'], function() {
    	Route::post('/addCoins/{coins}' , 'APIController@addCoins');
    	Route::post('/removeCoins/{coins}' , 'APIController@removeCoins');
    	Route::post('/rankImage/{path}' , 'APIController@changeImage');
    	Route::post('/addXP/{xp}', 'APIController@addXP');
    	Route::post('/addLevel', 'APIController@addLevel');
    	Route::post('/rank/{rank}', 'APIController@changeRank' );
    	Route::post('/multiplier/{multiplier}', 'APIController@changeMultiplier');
    	Route::post('/addPoints/{points}', 'APIController@add_a_points');
    	Route::post('/removePoints/{points}', 'APIController@remove_a_points');
    	Route::post('/user', 'APIController@getUserInfo');
    	Route::post('/logout', 'APIController@logout');
    });
});