<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\Auth;

class UserController extends Controller
{
    public function login(){
    	return view('login');
    }
    public function index(){
    	$arr = [
    		[ 'name' => 'john',
    			'age' => 21
    	],
    	[ 'name' => 'david',
    		'age' => 23
    	]
    ];
    return view('welcome',['users' => $arr]);
    }

    public function signIn(request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd($validated);
        if (Auth::attempt($validated)) {
            dd('login');
        } else{
            return redirect('/login')->with('error','invalid email or password');
        }
    }

    public function signup(){
        return view('signup');
    }

    public function registr(request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:16',
            'email' => 'required|unique:users,email',
            'age' => 'required|numeric|max:100',
            'password' => 'required|min:6',
        ]);
        // $data = $request->only(['name','email','age','password']);
        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        return redirect('/login');
    }
}