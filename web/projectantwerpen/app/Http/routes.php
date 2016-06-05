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
	Route::get('/vote/like/{id}', 'IndividualProjectController@like');
	Route::get('/vote/dislike/{id}', 'IndividualProjectController@dislike');
	Route::get('/home', 'HomeController@index');
	Route::get('/', 'HomeController@index');
	Route::get('/projecten', 'ProjectController@index');
	Route::post('/projecten/filter', 'ProjectController@filter');
	Route::get('/projectslist', 'AdminController@index');
	Route::get('/project/addproject', 'AdminController@addProject');
	Route::get('/project/update/{id}','AdminController@updateProject');
	Route::get('/project/{id}', 'IndividualProjectController@index');
	Route::get('/project/delete/{id}', 'AdminController@delete_project');
	Route::post('/reactie/{id}', 'IndividualProjectController@placeComment');
	Route::get('/search', 'SearchController@index');
	Route::post('/add_project', 'AdminController@add');
	Route::post('/update_project/{id}', 'AdminController@update');
	Route::get('/deleteComment/{id}', 'AdminController@deleteComment');
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
	Route::get('/getLikesDislikes/{id}', 'APIController@getLikes_Dislikes');
    Route::group(['middleware' => ['jwt.auth', 'jwt.refresh']], function() {
    	Route::post('/setCoins/{coins}' , 'APIController@setCoins');
    	Route::post('/setRankImage/{path}' , 'APIController@changeImage');
    	Route::post('/setXP/{xp}', 'APIController@setXP');
    	Route::post('/setLevel/{level}', 'APIController@setLevel');
    	Route::post('/setRank/{rank}', 'APIController@setRank' );
    	Route::post('/setMultiplier/{multiplier}', 'APIController@setMultiplier');
    	Route::post('/setPoints/{points}', 'APIController@setPoints');
    	Route::post('/like/{id}', 'APIController@like');
    	Route::post('/dislike/{id}', 'APIController@dislike');
    	Route::post('/user', 'APIController@getUserInfo');
    	Route::post('/logout', 'APIController@logout');
    });
});