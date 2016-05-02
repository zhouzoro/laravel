<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use File;

use Log;

class test extends Controller
{
	public function getIndex(){
	    return view('layouts.index');
    }
	public function postIndex(Request $request){
	    return $request->input('search-category');
    }
	public function getHeader(){
	    return view('layouts.app');
    }
    public function getReadJson(){
    	//set json file path
    	$path=base_path('resources/views/variables/menuItems.json');
		//check existance
    	if (!File::exists($path)) {
	        throw new Exception("Invalid File");
	    }
		//read file
	    $json = File::get($path);
	    //parse json
	    $arr=$json->toArray();
		Log::info($arr);
	    return $arr[0]->id;
    }
    public function getGeoname(){
    	return view('layouts.testPlace');
    }
}
