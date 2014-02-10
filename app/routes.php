<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('', array('as' => 'index', 'uses' => 'HomeController@index'));
Route::post('login', array('as' => 'login', 'uses' => 'UserController@login'));
Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));
Route::get('timestamp', 'HomeController@serverTime');

Route::resource('resource/user', 'UserController');
Route::resource('resource/news', 'NewsController');
Route::resource('resource/contest', 'ContestController');
Route::resource('resource/problem', 'ProblemController');
Route::resource('resource/status', 'StatusController');

Route::controller('problem', 'ProblemController');
Route::controller('status', 'StatusController');