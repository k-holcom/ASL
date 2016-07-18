<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;

class OfficialController extends Controller
{
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
}
