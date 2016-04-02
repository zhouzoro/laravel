<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CruiserReportController extends Controller
{
    public function postCreateOne(Request $req){
    	$ctest = new CruiserReport($req);
    	Log::info($ctest);
		$creport = new CruiserReport;
		$creport->author = $req->author;
		$creport->campus_vol = $req->campus_vol;
		$creport->title = $req->title;
		$creport->feature = $req->feature;
		$creport->tags = $req->tags;
		$creport->cover = $req->cover;
		$creport->quote = $req->quote;
		$creport->content = $req->content;
    }
}
