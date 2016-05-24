<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UploadController extends Controller
{
    public function getIndex(){
    	return 'upload index';
    }
    public function postFile(Request $request){
    	return $request;
    }
	public function postImg(Request $request){
		$file = $request->file('file') ? $request->file('file') : $request->file('image');
		$location =  self::saveFile($file,'images');
		return response()->json(['location' => $location]);
	}
	public function saveFile($file, $ftype){
		if($file){
			$dpath = base_path('wwwroot/' . $ftype);
			$extension = $file->getClientOriginalExtension(); // getting image extension
			$fileName = time().'_'.rand(0,99999).'.'.$extension;
			$file->move($dpath,$fileName);
		    return	'/images/'.$fileName;
		}
	}
}
