<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function getMe(){
    	return "it's you, it's not me"; 
    }
    public function getBananas(){
		return "LET'S GO BANANAS";
    }
}
