<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\Auth;
use App\Models\Post;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserSignInRequest;

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

    public function signIn(UserSignInRequest $request){
        $validated = $request->validated();
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

    public function registr(UserRegisterRequest $request){
        $validated = $request->validated();
        // $data = $request->only(['name','email','age','password']);
        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        return redirect()->route('login');
    }

    public function profile(){
        // $user = Auth::user();
        // dd($user);
        $posts = post::where('user_id',Auth::user()->id)->with('user')->get();
        // $p = $posts[0];
        // dd($p->user);
        return view('profile',['user' => Auth::user(),'posts' => $posts]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}