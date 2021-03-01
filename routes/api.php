<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users',[UserController::class,'apiStore']);

Route::post('Login',[UserController::class,'apiLogin']);

// Route::get('test',function(){
// 		$users = DB::table('users')->get();
// 		dd($users);
// 	});

Route::group(['middleware' => ['auth:api']], function(){

	Route::get('users/{id}',[UserController::class,'getUser']);

	Route::patch('posts/{post}/Likes',[PostController::class,'apiUpdateLikes']);
	
	Route::get('posts/{post}/Likes',[PostController::class,'apiGetLikes']);

	Route::get('me/post-Likes',[UserController::class,'getLikedPosts']);

	// Route::get('test',function(){
	// 	$users = User::whereHas('LikedPosts')->get();
	// 	return response()->json([
	// 		'data' => $users
	// 	]);
	// });

	// Route::get('test',function(){
	// 	$posts = Post::whereHas('Likes')->get();
	// 	return response()->json([
	// 		'data' => $posts
	// 	]);
	// });

	// Route::get('test',function(){
	// 	$usersCreatedPosts = User::whereHas('posts')->get();
	// 	return response()->json([
	// 		'data' => $usersCreatedPosts
	// 	]);
	// });

	// Route::get('test',function(){
	// 	$users = User::whereHas('LikedPosts',function($postQuery){
	// 		$postQuery->where('post_id','>',0);
	// 	})->get();
	// 	dd($users);
	// });

	// Route::get('test',function(){
	// 	$users = User::whereDoesntHave('LikedPosts')->get();
	// 	return response()->json([
	// 		'data' => $users
	// 	]);
	// });

	// Route::get('test',function(){
	// 	$users = User::whereHas('LikedPosts')->orWhereHas('posts')->get();
	// 	return response()->json([
	// 		'data' => $users
	// 	]);
	// });

	// Route::get('test',function(){
	// 	$users = User::where('age','>',20)->get();
	// 	return response()->json([
	//  		'data' => $users
	//  	]);
	// });

	// Route::get('test',function(){
	// 	$users = User::where('age','>',20)->Where('age','<',30)->get();
	// 	return response()->json([
	//  		'data' => $users
	//  	]);
	// });

	// Route::get('test',function(){
	// 	$users = User::where('age','>',20)->Where('age','<',30)->orWhere('age','>',40)->where('age','<',60)->get();
	// 	return response()->json([
	//  		'data' => $users
	//  	]);
	// });

	// Route::get('test',function(){
	// 	$post = Post::whereHas('Likes',function($userQuery){
	// 		$userQuery->where('age','>',20);
	// 	})->get();
	// 	return response()->json([
	// 		'data' => $post
	// 	]);
	// });

});

// route::get('users',function(){
// 	return response()->json(\App\Models\User::all());
// });