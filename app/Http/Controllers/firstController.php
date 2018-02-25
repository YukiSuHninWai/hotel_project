<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;

class firstController extends Controller
{
    //
	public function index(){    
		 $room_types = RoomType::all();
		 return view('frontend.index')->with('room_types',$room_types);
		//return view('frontend.hotel');	
	}
}
