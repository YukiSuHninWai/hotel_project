<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hotel;
use App\Room;
use App\Reservation;
use App\BookedRoom;
use Session;
use App\Policies\ReservationPolicy;

class userReservationController extends Controller
{
	public function __construct(){

		return $this->middleware('auth');
        return $this->middleware('customer');

	}

    public function reservation(Request $request){
    	$search = Session::get('search');
    	$userId = \Auth::id();
    	$hotel_id = $search['hotel_id'];
        $checkIn = date('Y-m-d', strtotime($search['checkIn']));
        $checkOut = date('Y-m-d',strtotime($search['checkOut']));
        $i = $checkIn;
        while($i<$checkOut){
            $date[] = $i;
            $i = $i=date('Y-m-d',strtotime("+1 day", strtotime($i)));
        }
    		$check_available = BookedRoom::whereIn('date', $date)->where('room_id',$request->room_id)->get()->first();
        if(empty($check_available)){    
            $data = [ 'customerId' => $userId,
            'hotelId' => $hotel_id,
            'checkIn' => $search['checkIn'],
            'checkOut' => $search['checkOut'],
            'roomId' => $request->room_id
            ];
            $reservation = Reservation::create($data);
            Session::flash('message',"Your reservation has finished successfully");            
            $i = $checkIn;
            while($i<$checkOut){
                $data = [
                'reservation_id' => $reservation->id,
                'room_id' => $request->room_id,
                'hotel_id' => $hotel_id,
                'date' => $i,
                ];
                BookedRoom::create($data);
                $i = $i=date('Y-m-d',strtotime("+1 day", strtotime($i)));
            }
        }
        else{
            Session::flash('message_danger',"This room is unavilable for that day.");
        }            
        return redirect()->route('view.show', $hotel_id);
    }
}
