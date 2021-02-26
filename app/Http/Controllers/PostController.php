<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	public function create(){
		return view('posts');
   }
   public function store(request $request){
   		$validated = $request->validate([
   			'data' => 'required|min:1|max:256'
   		]);
   		// dd($request->all());
   		$validated['user_id'] = Auth::user()->id;
   		// dd($validated);
   		post::create($validated);
   		// dd($post);
   		return redirect()->route('profile');
   }

   public function apiUpdateLikes(Post $post){
      // dd(Auth::user());
      $post->Likes()->syncWithoutDetaching(Auth::user()->id);
      return response()->json([
         'status' => 1
      ]);
   }

   public function apiGetLikes(Post $post){

      // $u = User::find(0);     for browser
      // Auth::login($u);
      $post->load('Likes');
      $emails = $post->Likes->pluck('email');

      return response()->json([
         'status' => 1,
         'data' => [
            'count' => $post->Likes->count(),
            'users' => $emails
         ]
      ]);
   }
}