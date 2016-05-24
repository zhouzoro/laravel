<?php

namespace App\Http\Controllers;

use Log;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    
    public function signup(Request $request){
    	Log::info(User::where('email',$request->input('email'))->count());
    	if(User::where('email',$request->input('email'))->count()){
			return response()->json(['status' => '504','msg' => '该邮箱已注册']);
    	};
		$newUser = new User;
		$newUser->email = $request->input('email');
		$newUser->username = $newUser->email;
		$newUser->password = $request->input('password');
		$newUser->save();
		$newUser->username = substr($newUser->email,0,strpos($newUser->email, '@'));
    	if(User::where('username',$newUser->username)->count()){
			$newUser->username = $newUser->username.strval($newUser->id);
    	};
		$newUser->save();
		return response()->json(['status' => '200','email' => $newUser->email,'username' => $newUser->username]);
    }

    public function login(Request $request){
    	if(strpos($request->input('email'), '@')){
	    	$result = User::where('email',$request->input('email'))->where('password',$request->input('password'));
    	}else{
    		$result = User::where('username',$request->input('email'))->where('password',$request->input('password'));
    	};
    	
		$user = $result->first();
    	if($user){
	    	Log::info('found');
	    	return response()->json(['status' => '200','email' => $user->email,'username' => $user->username]);
    	};
    	return response()->json(['status' => '504','msg' => '用户名/邮箱 或 密码有误']);
    }
}
