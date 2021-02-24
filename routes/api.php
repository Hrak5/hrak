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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users',[UserController::class,'apiStore']);

Route::get('users/{id}',[UserController::class,'getUser']);

Route::post('Login',[UserController::class,'apiLogin']);

Route::get('user',function(){
	dd(\Auth::user());
	// return response()->json
})->middleware('auth:api');

//127.0.0.1:8000

// route::get('users',function(){
// 	return response()->json(\App\Models\User::all());
// });
