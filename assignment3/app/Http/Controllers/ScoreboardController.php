<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Score;
use App\Standings;

class ScoreboardController extends Controller
{
    public function index(){
    	return view('scoreboard.index');
    }

    public function add_score(Request $request){
    	$info = Request::all();
        $user = Auth::user();
    	$add_score = new Score();
        $add_score->userId = $user->id;
    	$add_score->game_id = $info['gameId'];
    	$add_score->home_team = $info['hometeam'];
    	$add_score->home_score = $info['homescore'];
    	$add_score->away_team = $info['awayteam'];
    	$add_score->away_score = $info['awayscore'];

        $scores = Score::get();
        $game = Score::where('game_id', $add_score->game_id)->get();
        $awayTeam = Standings::where('team', $add_score->away_team)->get();
        $aTeam = Standings::findOrFail($awayTeam[0]->id);
        $homeTeam = Standings::where('team', $add_score->home_team)->get();
        $hTeam = Standings::findOrFail($homeTeam[0]->id);

        if(count($game) < 2){
            $add_score->save(); 
        }
        $game = Score::where('game_id', $add_score->game_id)->get(); 
        if(count($game) == 2){
            if($game[0]->home_score == $game[1]->home_score && $game[0]->away_score == $game[1]->away_score){
                if($add_score->home_score > $add_score->away_score){
                    $wins = $hTeam->wins;
                    $wins = $wins + 1;
                    $hTeam->wins = $wins;
                    $gamesLeft = $hTeam->games_left;
                    if($gamesLeft > 0){
                        $gamesLeft = $gamesLeft - 1;
                    }
                    $hTeam->games_left = $gamesLeft;
                    $pf = $hTeam->pf;
                    $pf = $pf + $add_score->home_score;
                    $hTeam->pf = $pf;
                    $pa = $hTeam->pa;
                    $pa = $pa + $add_score->away_score;
                    $hTeam->pa = $pa;
                    $hTeam->save();

                    $loss = $aTeam->loss;
                    $loss = $loss + 1;
                    $aTeam->loss = $loss;
                    $gamesLeft = $aTeam->games_left;
                    if($gamesLeft > 0){
                        $gamesLeft = $gamesLeft - 1;
                    }
                    $aTeam->games_left = $gamesLeft;
                    $pf = $aTeam->pf;
                    $pf = $pf + $add_score->away_score;
                    $aTeam->pf = $pf;
                    $pa = $aTeam->pa;
                    $pa = $pa + $add_score->home_score;
                    $aTeam->pa = $pa;
                    $aTeam->save();

                }
                if($add_score->away_score > $add_score->home_score){
                    $wins = $aTeam->wins;
                    $wins = $wins + 1;
                    $aTeam->wins = $wins;
                    $gamesLeft = $aTeam->games_left;
                    if($gamesLeft > 0){
                        $gamesLeft = $gamesLeft - 1;
                    }
                    $aTeam->games_left = $gamesLeft;
                    $pf = $aTeam->pf;
                    $pf = $pf + $add_score->home_score;
                    $aTeam->pf = $pf;
                    $pa = $aTeam->pa;
                    $pa = $pa + $add_score->away_score;
                    $aTeam->pa = $pa;
                    $aTeam->save();

                    $loss = $hTeam->loss;
                    $loss = $loss + 1;
                    $hTeam->loss = $loss;
                    $gamesLeft = $hTeam->games_left;
                    if($gamesLeft > 0){
                        $gamesLeft = $gamesLeft - 1;
                    }
                    $hTeam->games_left = $gamesLeft;
                    $pf = $hTeam->pf;
                    $pf = $pf + $add_score->away_score;
                    $hTeam->pf = $pf;
                    $pa = $hTeam->pa;
                    $pa = $pa + $add_score->home_score;
                    $hTeam->pa = $pa;
                    $hTeam->save();
                }
            }
        }
    	return redirect('/');
    }
}
