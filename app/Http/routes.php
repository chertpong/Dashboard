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
Route::get('',function(){
    return view('index');
});
Route::get('home',function(){
    return view('home');
});
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Dashboard
Route::get('dashboard','DashboardController@index');
Route::get('dashboard/activity/date/{date}','DashboardController@getByDate');
Route::get('dashboard/activity/id/{id}','DashboardController@getById');
//Create game data
Route::get('gamedata/create','GameDataController@create');
