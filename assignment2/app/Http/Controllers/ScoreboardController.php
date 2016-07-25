<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Score;

class ScoreboardController extends Controller
{
    public function index(){
    	return view('scoreboard.index');
    }

    public function add_score(Request $request){
    	$info = Request::all();
    	$add_score = new Score();
    	$add_score->game_id = $info['gameId'];
    	$add_score->home_team = $info['hometeam'];
    	$add_score->home_score = $info['homescore'];
    	$add_score->away_team = $info['awayteam'];
    	$add_score->away_score = $info['awayscore'];
    	$add_score->game_date = $info['dateM'] . '/' . $info['dateD'];
    	$add_score->save();
    	return redirect('/');
    }
}
