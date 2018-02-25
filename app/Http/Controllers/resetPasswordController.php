<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class resetPasswordController extends Controller
{
    //
	public function __construct(){
		$this->middleware('auth');
	}
	public function index(){
		return view('user.reset_password');
	}
	public function update(Request $request){
		$validated_data = $request->validate([
			'old_password' => 'required|string|min:6',
			'password'  => 'required|string|min:6|confirmed',            
			]);
		$user = \Auth::user();
		if (Hash::check($request->old_password, $user->password)) {
			$user = User::findOrFail($user->id);
			$request->merge([ 'password' => bcrypt($request->password)]);
			$user->update($request->all());
			return redirect('index');
		}
		else{
			return back()->witherrors(['old_password'=>'Your password does not match with current password']);
		}
	}
}

