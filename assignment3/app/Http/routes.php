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
    return view('home');
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
Route::get('schedules', 'OfficialController@addScheduleIndex');
Route::post('schedules', 'OfficialController@addGame');
Route::get('/addTeams', 'OfficialController@addTeams');
Route::post('/addTeams', 'OfficialController@addTeamsScore');
Route::get('/scores', 'OfficialController@scores');
Route::post('/scores', 'OfficialController@scoresCorrect');

/*
|--------------------------------------------------------------------------
| Scoreboard Routes
|--------------------------------------------------------------------------
|
| This will be where the scoreboard is routed through.
|
*/

Route::get('scoreboard', 'ScoreboardController@index');
Route::post('scoregame', 'ScheduleController@scoreGameBut');
Route::post('add_score', 'ScoreboardController@add_score');

/*
|--------------------------------------------------------------------------
| Schedule Routes
|--------------------------------------------------------------------------
|
| This will be where the schedules will be routed through.
|
*/

Route::get('peewee', 'ScheduleController@peeweeSchedule');
Route::get('minor', 'ScheduleController@minorSchedule');
Route::get('major', 'ScheduleController@majorSchedule');

/*
|--------------------------------------------------------------------------
| Standings Routes
|--------------------------------------------------------------------------
|
| This will be where the standings will be routed through.
|
*/

Route::get('peeweeStandings', 'HomeController@peeweeStandings');
Route::get('minorStandings', 'HomeController@minorStandings');
Route::get('majorStandings', 'HomeController@majorStandings');










