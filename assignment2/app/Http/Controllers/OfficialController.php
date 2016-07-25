<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Schedule;

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
}
