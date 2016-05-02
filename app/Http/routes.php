<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('layouts.index');
});

Route::resource('cruiser_report','CruiserReportController');

Route::post('/upload/file',function(Request $request){
	saveFile($request->file('file'),'files');
	saveFile($request->file('image'),'images');

    });

Route::get('/upload/files',function(){
    	return view('upload_test');
    });

Route::get('/login',function(){
    	return view('layouts.loginPage');
    });
Route::get('/signup',function(){
    	return view('layouts.signupPage');
    });

Route::post('/login',function(Request $request){
    	$user = App\User::where('email',$request->input('email'))->first();
    	return $user->email;
    });

Route::post('/signup',function(Request $request){
	$newUser = new App\User;
	$newUser->email = $request->input('email');
	$newUser->username = $request->input('email');
	$newUser->password = $request->input('password');
	$newUser->save();
	$user = App\User::where('email',$newUser->email)->first();
	return response()->json(['status' => '200 OK','id' => $user->id,'username' => $user->username]);
});

Route::post('/upload/images','UploadController@postImg');

Route::get('/new_post',function(){
	return view('layouts.newPost');
});

Route::controller('user','UserController');

Route::controller('test','test');
//Route::controller('upload','UploadController');
