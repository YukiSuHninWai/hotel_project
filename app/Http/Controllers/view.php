<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HotelImage;
use App\BookedRoom;
use App\Room;
use App\Hotel;
use App\RoomType;
use Session;

class viewController extends Controller
{
    //
	public function show($id){
		$search = Session::get('search');
		$result = Session::get('result');
		$hotel = $result->where('id', $id)->first();
		$checkIn =  date('Y-m-d',strtotime($search['checkIn']));
		$checkOut = date('Y-m-d',strtotime($search['checkOut']));
		$i = $checkIn;
		while($i<$checkOut){
			$date[] = $i;
			$i = $i=date('Y-m-d',strtotime("+1 day", strtotime($i)));
		}
		$rooms = Room::with('room_type1')->whereNotIn('id',Room::select('rooms.id')->join('booked_rooms', 'booked_rooms.room_id', '=', 'rooms.id')
				->whereIn('booked_rooms.date', $date)->get())->where('hotel_id',$id)->get();
		$room_type = RoomType::where('id',$search['count'])->get();
		$search->put('hotel_id', $id);
		Session::put('search', $search);
		return view('frontend.show',compact('hotel','rooms','room_type'));
	}
}
