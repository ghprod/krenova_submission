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


Route::get('auth/login', 'Auth\AuthController@login');
Route::get('auth/logout', 'Auth\AuthController@logout');

Route::get('auth/{provider}', 'Auth\AuthController@socialLogin');
Route::get('auth/facebook/callback', 'Auth\AuthController@facebookCallback');
Route::get('auth/twitter/callback', 'Auth\AuthController@twitterCallback');

Route::get('/', 'SubmissionController@index');
Route::get('submission', 'SubmissionController@index');
Route::get('submission/create', 'SubmissionController@create');
Route::post('submission/create', 'SubmissionController@store');
