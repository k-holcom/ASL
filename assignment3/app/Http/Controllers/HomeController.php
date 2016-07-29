<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Standings;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function peeWeeStandings()
    {
        $teams = Standings::orderBy('wins', 'DESC')->get();
        return view('standings.peewee', compact('teams'));
    }

    public function minorStandings()
    {
        $teams = Standings::orderBy('wins', 'DESC')->get();
        return view('standings.minor', compact('teams'));
    }

    public function majorStandings()
    {
        $teams = Standings::orderBy('wins', 'DESC')->get();
        return view('standings.major', compact('teams'));
    }
}
