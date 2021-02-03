<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
    	dd($request->all());
    }

    public function signup(){
        return view('signup');
    }

    public function registr(request $request){
        $data = $request->only(['name','email','age','password']);
        // dd($data);
        $data['password'] = bcrypt($data['password']);
        // dd($data);
      $user =  User::create($data);
        // dd($user);
      return redirect('/login');
    }
}