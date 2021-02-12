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
        User::create($request->validated());
        return redirect()->route('login');
    }

    public function profile(){
        $posts = post::where('user_id',Auth::user()->id)->with('user')->get();
        // $user  = User::first();
        // dd($user->birth_year); // dd($user->name);
        // $p = $posts[0];
        // dd($p->user);
        return view('profile',['user' => Auth::user(),'posts' => $posts]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function edit(){
        return view('user-edit',[
            'user' => Auth::user()
        ]);
    }

    public function update(request $request){
        $validated = $request->validate([
            'name' => 'nullable|min:3|max:16',
            'password' => 'nullable|min:6',
            'image' => 'nullable|image|max:2048'
        ]);
        // dd($request->all());
        $validated = array_filter($validated,function($value){
            return !empty($value);
        });
        // dd($validated);
        Auth::user()->update($validated);
         if ($request->hasfile('image')) {
            $imageName = $request->file('image')->store('images');
            // dd($imageName);
            Auth::user()->profile_image = $imageName;
            Auth::user()->save();
            // dd(Auth::user());
        }
        return redirect()->route('profile');
    }
}