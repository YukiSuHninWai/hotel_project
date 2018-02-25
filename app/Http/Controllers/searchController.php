<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Room;
use App\RoomType;
use App\BookedRoom;
use Session;
use Illuminate\Http\Request;

class searchController extends Controller
{
    //
    public function __construct(){
    	
    }
	public function search(Request $request){
		$search = collect([
		'street_number' => $request->street_number,
		'route' => $request->route,
		'locality' => $request->locality,
		'state' => $request->state,
		'country' => $request->country,
		'room' => $request->room,
		'checkIn' => $request->checkin,
		'checkOut' => $request->checkout,
		'count' => $request->count,
		]);
		$checkin = $request->checkin;
		$checkout = $request->checkout;
		$i = $checkin;
        while($i<$checkout){
            $date[] = $i;
            $i = date('Y-m-d',strtotime("+1 day", strtotime($i)));
        }
        // dd($date);
		$query = Hotel::with(['room_count'=>function($query) use($request){
			$query->where('type' , $request->room);

		},'room'=>function($query) use($request,$date){
			$query->join('booked_rooms', 'booked_rooms.room_id', '=', 'rooms.id')->where('rooms.type' , $request->room)->whereIn('booked_rooms.date', $date)->get();

		},'image','facility'=>function($query) use($request){
			$query->where('data' , 1);
		}]);
		if(isset($request->street_number)){
			$query->where('street_number',$request->street_number);
		}
		if(isset($request->route)){
			$query->where('route',$request->route);
		}
		if(isset($request->state)){
			$query->where('state',$request->state);
		}
		if(isset($request->locality)){			
			$query->where('city', $request->locality);
		}
		if(isset($request->country)){
			$query->where('country',$request->country);
		}
		if(isset($request->room)){
			$query->whereHas('room', function ($query) use($request){
				$query->where('type', $request->room);
			});
		}
		$results = $query->get();
		Session::put('search', $search);
		Session::put('result',$results);
		return view('frontend.result')->with('results',$results);
	}
}
