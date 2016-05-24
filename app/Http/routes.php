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


//==tests=====================//

Route::controller('test','test');

//Route::controller('upload','UploadController');

Route::controller('user','UserController');

Route::get('/upload/files',function(){
        return view('upload_test');
    });

//Route::resource('cruiser_report','CruiserReportController');

//==pages=====================//
Route::get('/', function () {
	$posts = DB::table('cruiser_reports')
                ->join('users', function ($join){
                        $join->on('users.id', '=', 'cruiser_reports.author');
                })
                ->select('cruiser_reports.*','users.username as author_name')
                ->orderBy('updated_at', 'desc')
                ->skip(0)
                ->take(4)
                ->get();
    return view('layouts.index',['carouselItems' => $posts]);
});



Route::get('/images/user/{picname}',function($picname){
        if(!File::exists(base_path('wwwroot/images/user/' . $picname))){
        	return response()->file(base_path('wwwroot/images/user/007.jpg'));
        }
    });

Route::get('/images/user/{picname}',function($picname){
        if(!File::exists(base_path('wwwroot/images/user/' . $picname))){
        	return response()->file(base_path('wwwroot/images/user/007.jpg'));
        }
    });
Route::get('/cruiser_reports/images/{imgname}','CruiserReportsController@redirectImages');
//==pages=====================//

//Route::get('/cruiser_report/{id}', 'CruiserReportController@getPost');

Route::get('/home', function () {
    return redirect('/');
});
//==users=====================//
Route::get('/login',function(){
    	return view('layouts.loginPage');
    });
Route::get('/signup',function(){
    	return view('layouts.signupPage');
    });

Route::post('/login','UserController@login');

Route::post('/signup','UserController@signup');

Route::post('/upload/images','UploadController@postImg');

Route::resource('user','UserController', ['except' => [
    'index', 'create','destroy'
]]);

Route::resource('cruiser_reports','CruiserReportController');

Route::resource('cruise_campus','CruiseCampusController');
