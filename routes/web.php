<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[UserController::class,'index']);

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/login', [UserController::class,'login']);

// Route::get('/login', function () {

// 	$a = 6;
// 	$b = 4;
// 	$c = $a+$b;

//     return view('login',[
//     	'c' => $c
//     ]);
// });


// Route::post('/login', function () {
//     dd(1);
// });


// Route::get('user/{id}', function ($id) {
// 	dd($id);
// });


// Route::post('/login',function(Request $request){
// 	// dd($request->all());
// 	dd($request->get('email'));
// });

Route::post('/login',[UserController::class,'signIn']);

Route::get('/signup',[UserController::class,'signup']);

Route::post('/registr',[UserController::class,'registr']);

use App\Models\User;
Route::get('/test',function(){
	
	// $users = User::get();

	// foreach ($users as $user) {
	// 	dump($user->email);
	// }
	// dd($users);

	// $user = User::first();
	// dump($user->email);

	// $user = User::where('age','<',35)->first();
	// dd($user->name);

	// $user = User::where('age',21)->get();
	// dump($user);

	// $user = User::where('age',21)->select(['email'])->get();
	// dump($user);

	// $users = User::orderBy('age','asc')->get();   /dasc
	// dump($users);

	// $users = User::limit(1)->get();
	// dump($users);

	// $users = User::limit(1)->offset(5)->get();    //skip(5)
	// dump($users);


	// $users = User::groupBy('name')->get();
	// dump($users);

	// $count = User::where('age','>',15)->count();
	// dump($users);

	// $user = User::where('id',4)->first();
	// dd($user->name);
	// $user = User::find(2);
	// dd($user);

	// $user = User::whereAge(26)->first();
	// dd($user);



});