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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| League Official Routes
|--------------------------------------------------------------------------
|
| This is where all the pages that are associated with League Officials 
| will be contained and routed through. 
|
*/

Route::get('users', 'OfficialController@userIndex');
Route::get('users/{users}', 'OfficialController@userLevel');
Route::patch('users/{users}', 'OfficialController@userLevelUpdate');
//Testing Route to (Delete before Submitting)
Route::resource('userTest', 'OfficialController');

/*
|--------------------------------------------------------------------------
| Scoreboard Routes
|--------------------------------------------------------------------------
|
| This will be where the scoreboard is routed through.
|
*/

Route::get('scoreboard', 'ScoreboardController@index');

















