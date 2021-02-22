<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Controllers\UserController;

use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Storage;

Route::get('/',[UserController::class,'index']);

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/login', [UserController::class,'login'])->name('login');

// Route::get('/login', function () {

// 	$a = 6;
// 	$b = 4;
// 	$c = $a+$b;

//     return view('login',[
//     	'c' => $c
//     ]);
// });

// Route::get('user/{id}', function ($id) {
// 	dd($id);
// });


// Route::post('/login',function(Request $request){
// 	// dd($request->all());
// 	dd($request->get('email'));
// });

Route::post('/login',[UserController::class,'signIn'])->name('post-login');

Route::get('/signup',[UserController::class,'signup'])->name('signup');

Route::post('/registr',[UserController::class,'registr']);

Route::group(['middleware' => ['checkUserAuth']],function(){

Route::get('/profile',[UserController::class,'profile'])->name('profile');

Route::post('/logout',[UserController::class,'logout'])->name('logout');

Route::get('me/edit',[UserController::class,'edit'])->name('user.edit');

Route::post('me/edit',[UserController::class,'update'])->name('user.update');

Route::get('posts',[PostController::class,'create'])->name('post-create');

Route::post('/posts',[PostController::class,'store'])->name('store-posts');

Route::get('me/profile-image',[UserController::class,'getProfileImage'])->name('user.profile-image');

// Route::get('test',function(){
// 	$arr = [
// 		'name' => 'asdas'
// 	];
// });

// inserting updating delete ge group find  eloquent getting started



// Route::get('me/profile_image',function(){

// return response()->file(Storage::path(\Auth::user()->profile_image));

// })->name('user.profile');

});


// use App\Models\User;
// Route::get('/test',function(){
	
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
// });