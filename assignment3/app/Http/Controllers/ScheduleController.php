<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function peeweeSchedule(){
    	$games = Schedule::get();
    	return view('schedules.peewee', compact('games'));
    }

    public function minorSchedule(){
    	$games = Schedule::get();
    	return view('schedules.minor', compact('games'));
    }

    public function majorSchedule(){
    	$games = Schedule::get();
    	return view('schedules.major', compact('games'));
    }

    public function scoreGameBut(Request $request){
    	$user = Auth::user();
    	$info = Request::all();
    	return view('scoreboard.scores', compact('info', 'user'));
    }
}
