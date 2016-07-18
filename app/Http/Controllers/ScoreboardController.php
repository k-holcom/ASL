<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ScoreboardController extends Controller
{
    public function index(){
    	return view('scoreboard.index');
    }
}
