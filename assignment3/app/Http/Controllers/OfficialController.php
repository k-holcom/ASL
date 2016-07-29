<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Schedule;
use App\Standings;
use App\Score;

class OfficialController extends Controller
{
    //Control Users
    public function userIndex(){
    	$user = Auth::user();
    	$users = User::get();
    	if($user->role == 'official'){
    		return view('official.users', compact('user', 'users'));
    	}else{
    		return redirect('/home');
    	}
    }

    public function userLevel($id){
    	$userinfo = User::findOrFail($id);
    	return view('official.user_auth_level_change', compact('userinfo'));
    }

    public function userLevelUpdate(Request $request, $id){
    	$user = User::findOrFail($id);
    	$info = Request::all();
    	$user->role = $info['level'];
    	$user->save();
    	return redirect('/users');
    }

    //Add Schedules
    public function addScheduleIndex(){
        $user = Auth::user();
        if($user->role == 'official'){
            $games = Schedule::get();
            return view('official.add_schedule', compact('user', 'games'));
        }else{
            return redirect('/home');
        }
    }

    public function addGame(Request $request){
        $info = Request::all();
        if($info['home_team'] == '' || $info['away_team'] == ''){
            return redirect('/schedules');
        }else{
            if(Request::get('yes')){
                $game = new Schedule();
                $game->home = $info['home_team'];
                $game->away = $info['away_team'];
                $game->month = $info['month'];
                $game->day = $info['day'];
                $game->league = $info['league'];
                $game->save();
                return redirect('/schedules');
            }
            if(Request::get('no')){
                $game = new Schedule();
                $game->home = $info['home_team'];
                $game->away = $info['away_team'];
                $game->month = $info['month'];
                $game->day = $info['day'];
                $game->league = $info['league'];
                $game->save();
                return redirect('/home');
            }
        }

    }

    public function addTeams(){
        return view('official.addTeams');
    }

    public function addTeamsScore(Request $request){
        $info = Request::all();
        $team = new Standings();
        $team->league = $info['league'];
        $team->team = $info['team'];
        $team->total_games = $info['games'];
        $team->games_left = $info['games'];
        $team->save();
        if(Request::get('yes')){
            return redirect('/addTeams');
        }
        if(Request::get('no')){
            return redirect('/');
        }
    }

    public function scores(){
        $pWschedule = Schedule::where('league', 'Pee-Wee')->get();
        $numGames = count($pWschedule);
        $scorePairsPW = [];
        foreach($pWschedule as $pW){
            $scores = Score::where('game_id', $pW->id)->get();
            if(count($scores) > 0){
                $scorePairsPW[] = $scores;
            }
        }
        $mischedule = Schedule::where('league', 'Minor')->get();
        $numGames = count($mischedule);
        $scorePairsMi = [];
        foreach($mischedule as $Mi){
            $scores = Score::where('game_id', $Mi->id)->get();
            if(count($scores) > 0){
                $scorePairsMi[] = $scores;
            }
        }
        $maschedule = Schedule::where('league', 'Major')->get();
        $numGames = count($maschedule);
        $scorePairsMa = [];
        foreach($maschedule as $Ma){
            $scores = Score::where('game_id', $Ma->id)->get();
            if(count($scores) > 0){
                $scorePairsMa[] = $scores;
            }
        }
        return view('official.scores', compact('scorePairsPW', 'scorePairsMi', 'scorePairsMa'));
    }

    public function scoresCorrect(Request $request)
    {
        $user = Auth::user();
        if(Request::get('correct')){
            $info = Request::all();
            $game = Score::findOrFail($info['score_id']);
            $gameId = $game->game_id;
            $remainingGame = Score::where('game_id', $gameId)->first();
            $newGame = new Score();
            $newGame->game_id = $gameId;
            $newGame->userId = $user->id;
            $newGame->home_team = $remainingGame->home_team;
            $newGame->home_score = $remainingGame->home_score;
            $newGame->away_team = $remainingGame->away_team;
            $newGame->away_score = $remainingGame->away_score;
            $newGame->save();

            $games = Score::where('game_id', $gameId)->first();
            $awayTeam = Standings::where('team', $newGame->away_team)->get();
            $aTeam = Standings::findOrFail($awayTeam[0]->id);
            $homeTeam = Standings::where('team', $newGame->home_team)->get();
            $hTeam = Standings::findOrFail($homeTeam[0]->id);
            if(count($games) == 2){
                if($newGame->home_score > $newGame->away_score){
                    $wins = $hTeam->wins;
                    $wins = $wins + 1;
                    $hTeam->wins = $wins;
                    $gamesLeft = $hTeam->games_left;
                    if($gamesLeft > 0){
                        $gamesLeft = $gamesLeft - 1;
                    }
                    $hTeam->games_left = $gamesLeft;
                    $pf = $hTeam->pf;
                    $pf = $pf + $game->home_score;
                    $hTeam->pf = $pf;
                    $pa = $hTeam->pa;
                    $pa = $pa + $game->away_score;
                    $hTeam->pa = $pa;
                    return $hTeam;

                }
                if($newGameame->away_score > $newGameame->home_score){
                    $wins = $aTeam->wins;
                    $wins = $wins + 1;
                    $aTeam->wins = $wins;
                    $gamesLeft = $aTeam->games_left;
                    if($gamesLeft > 0){
                        $gamesLeft = $gamesLeft - 1;
                    }
                    $aTeam->games_left = $gamesLeft;
                    $pf = $aTeam->pf;
                    $pf = $pf + $game->home_score;
                    $aTeam->pf = $pf;
                    $pa = $aTeam->pa;
                    $pa = $pa + $game->away_score;
                    $aTeam->pa = $pa;
                    return $aTeam;
                }
            }
        }
        if(Request::get('incorrect')){
            $info = Request::all();
            $game = Score::findOrFail($info['score_id']);
            $gameId = $game->game_id;
            $game->delete();
            $remainingGame = Score::where('game_id', $gameId)->first();
            $newGame = new Score();
            $newGame->game_id = $gameId;
            $newGame->userId = $user->id;
            $newGame->home_team = $remainingGame->home_team;
            $newGame->home_score = $remainingGame->home_score;
            $newGame->away_team = $remainingGame->away_team;
            $newGame->away_score = $remainingGame->away_score;
            $newGame->save();

            $games = Score::where('game_id', $gameId)->get();
            $awayTeam = Standings::where('team', $newGame->away_team)->get();
            $aTeam = Standings::findOrFail($awayTeam[0]->id);
            $homeTeam = Standings::where('team', $newGame->home_team)->get();
            $hTeam = Standings::findOrFail($homeTeam[0]->id);
            if(count($games) == 2){
                if($newGame->home_score > $newGame->away_score){
                    $wins = $hTeam->wins;
                    $wins = $wins + 1;
                    $hTeam->wins = $wins;
                    $gamesLeft = $hTeam->games_left;
                    if($gamesLeft > 0){
                        $gamesLeft = $gamesLeft - 1;
                    }
                    $hTeam->games_left = $gamesLeft;
                    $pf = $hTeam->pf;
                    $pf = $pf + $game->home_score;
                    $hTeam->pf = $pf;
                    $pa = $hTeam->pa;
                    $pa = $pa + $game->away_score;
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
                    $pf = $pf + $game->away_score;
                    $aTeam->pf = $pf;
                    $pa = $aTeam->pa;
                    $pa = $pa + $game->home_score;
                    $aTeam->pa = $pa;
                    $aTeam->save();

                }
                if($newGame->away_score > $newGame->home_score){
                    $wins = $aTeam->wins;
                    $wins = $wins + 1;
                    $aTeam->wins = $wins;
                    $gamesLeft = $aTeam->games_left;
                    if($gamesLeft > 0){
                        $gamesLeft = $gamesLeft - 1;
                    }
                    $aTeam->games_left = $gamesLeft;
                    $pf = $aTeam->pf;
                    $pf = $pf + $game->away_score;
                    $aTeam->pf = $pf;
                    $pa = $aTeam->pa;
                    $pa = $pa + $game->home_score;
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
                    $pf = $pf + $game->home_score;
                    $hTeam->pf = $pf;
                    $pa = $hTeam->pa;
                    $pa = $pa + $game->away_score;
                    $hTeam->pa = $pa;
                    $hTeam->save();
                }
            }
        }

        
        return redirect('/scores');
    }
}
