<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookedRoom;


class reservedRoomController extends Controller
{
    //
    public function __contruct(){
    	$this->middleware('auth');
    }
    public function index(){
    	$hotel_id = \Auth::user()->hotel->id;
    	$reserved_rooms = BookedRoom::with('room')->where('hotel_id',$hotel_id)->orderBy('date')->get();
    	return view('reserved_room.index',compact('reserved_rooms'));
    }
}
