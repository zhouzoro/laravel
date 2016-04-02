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
Route::get('/test', function () {
    return 'hello its me';
});
Route::get('/myAccount','UserController@me');

Route::resource('cruiser_report','CruiserReportController');

Route::post('/upload/file',function(Request $request){
	saveFile($request->file('file'),'file');
	saveFile($request->file('image'),'image');

    });

Route::get('/upload/file',function(){
    	return view('upload_test');
    });

Route::controller('user','UserController');

//Route::controller('test','test');
//Route::controller('upload','UploadController');

function saveFile($file, $ftype){
	if($file){
		$dpath = '../../' . $ftype . 's';
		Log::info($dpath);
		$extension = $file->getClientOriginalExtension(); // getting image extension
		$fileName = rand(111111,999999).'.'.$extension;
	    return	$file->move($dpath,$fileName);
	}
}