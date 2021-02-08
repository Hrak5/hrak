<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\Auth;

class UserController extends Controller
{
    public function login(){
        if (Auth::check()) {
        return redirect()->route('profile');
    } else {
        return view('login');
    }
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
            return redirect()->route('profile');
        } else{
            return redirect()->route('login')->with('error','invalid email or password');
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
        return redirect()->route('login');
    }

    public function profile(){
        // $user = Auth::user();
        // dd($user);
        return view('profile',['user' => Auth::user()]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

 // public function profile(){
 //        // $user = Auth::user();
 //        // dd($user);
 //        if(Auth::check()){
 //            return view('profile',['user' => Auth::user()]);
 //        } else {
 //            return redirect('/login');
 //        }
 //    }