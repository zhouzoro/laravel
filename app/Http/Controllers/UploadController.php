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
}
