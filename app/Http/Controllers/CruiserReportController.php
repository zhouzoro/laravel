<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\User;
use App\CruiserReport;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CruiserReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'cruser report is here';
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.newPost');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('post received');
        Log::info($request->input('username'));
        Log::info($request->input('email'));
        Log::info(User::where('username',$request->input('username'))->where('email',$request->input('email'))->count());
        if(User::where('username',$request->input('username'))->where('email',$request->input('email'))->count()){
        Log::info('post varified');
            $user = User::where('username',$request->input('username'))->where('email',$request->input('email'))->first();
            $newPost = new CruiserReport;
            $newPost->author = $user->id;
            $newPost->title = $request->input('title');
            $newPost->content = $request->input('content');
            $newPost->quote = $request->input('quote');
            $newPost->cover = $request->input('hero-img');
            $newPost->save();
            return response()->json(['status' => '200','msg' => 'success','url' => '/cruiser_reports/'.strval($newPost->id)]);
        };
        return response()->json(['status' => '504','msg' => 'log for error']);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repid = intval($id);
        $post = DB::table('cruiser_reports')
                        ->join('users', function ($join) use($repid){
                                $join->on('users.id', '=', 'cruiser_reports.author')
                                ->where('cruiser_reports.id', '=', $repid);
                        })
                        ->select('cruiser_reports.*','users.username as author_name')
                        ->get()[0];
        Log::info($post->author_name);
        return view('layouts.cruiser_report', ['post' => $post]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function redirectImages($imgname){
        return response()->file(base_path('wwwroot\\images\\'.$imgname));

    }
}
