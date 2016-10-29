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

Route::get('/', 'HomeController@index');
Route::get('/category/{id}', 'CategoryController@index');
Route::get('/article/{id}', 'ArticleController@show');
Route::get('/rules', function(){return view('rules');});

Route::get('/leaderboard', 'LeaderboardController@show');
