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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users',[UserController::class,'apiStore']);

Route::post('Login',[UserController::class,'apiLogin']);

Route::group(['middleware' => ['auth:api']], function(){

	Route::get('users/{id}',[UserController::class,'getUser']);

	Route::patch('posts/{post}/Likes',[PostController::class,'apiUpdateLikes']);
	
	Route::get('posts/{post}/Likes',[PostController::class,'apiGetLikes']);
});

// route::get('users',function(){
// 	return response()->json(\App\Models\User::all());
// });
