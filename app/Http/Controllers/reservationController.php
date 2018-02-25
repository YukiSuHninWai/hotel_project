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
class reservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $user = \Auth::user();
        if($user->role == 'admin'){
            $hotel_id = \Auth::user()->hotel->id;
            $reservations = Reservation::with('user','room')->where('hotelId',$hotel_id)->orderBy('checkIn')->paginate(5);
        return view('reservation.index',compact('reservations'));
        }
      if($user->role == 'customer'){
         $reservations = Reservation::with('user','room','hotel1')->where('customerId',$user->id)->orderBy('checkIn')->paginate(5);
         return view('frontend.list',compact('reservations'));
      }    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = \Auth::user()->load(['hotel', 'hotel.room']);
        //$user = \Auth::user();
        $rooms = $user->hotel->room;
        return view('reservation.create',compact('rooms'));
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
        $userId = \Auth::id();
        $hotel_id = \Auth::user()->hotel->id;
        $checkIn = date('Y-m-d', strtotime($request->checkIn));
        $checkOut = date('Y-m-d',strtotime($request->checkOut));
        $i = $checkIn;
        while($i<$checkOut){
            $date[] = $i;
            $i = $i=date('Y-m-d',strtotime("+1 day", strtotime($i)));
        } 
        $check_available = BookedRoom::whereIn('date', $date)->where('room_id',$request->roomId)->get()->first();
        if(empty($check_available)){    
            $request->merge([ 'customerId' => $userId]);
            $request->merge([ 'hotelId' => $hotel_id]);
            $request->merge([ 'checkIn' => $checkIn ]);
            $request->merge([ 'checkOut' => $checkOut ]);
            $this->validate($request, Reservation::$rules);
            $reservation = Reservation::create($request->all());
            Session::flash('message',"Your reservation has finished successfully");            
            $i = $checkIn;
            while($i<$checkOut){
                $data = [
                'reservation_id' => $reservation->id,
                'room_id' => $request->roomId,
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
        return redirect()->route("reservation.index");
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
        $user = \Auth::user();
        $hotel_id = \Auth::user()->hotel->id;
        $rooms = Room::where('hotel_id',$hotel_id)->get();
        $reservation = Reservation::findOrFail($id);  
        if ($user->can('edit', $reservation)) {
            //
            // $reservation->checkIn = date('d/m/Y', strtotime($reservation->checkIn)); 
            // $reservation->checkOut = date('d/m/Y', strtotime($reservation->checkOut));   
            return view("reservation.edit", compact("reservation","rooms"));
        }
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
        $user = \Auth::user();
        $hotel_id = \Auth::user()->hotel->id;
        $checkIn = date('Y-m-d', strtotime($request->checkIn));
        $checkOut = date('Y-m-d',strtotime($request->checkOut));
        $i = $checkIn;
        while($i<$checkOut){
            $date[] = $i;
            $i = $i=date('Y-m-d',strtotime("+1 day", strtotime($i)));
        }        
        $check_available = BookedRoom::whereIn('date', $date)->where([['room_id','=',$request->roomId],['reservation_id','<>',$id]])->get()->first();;
        if(empty($check_available)){
            $request->merge([ 'customerId' => $user->id]);
            $request->merge([ 'hotelId' => $hotel_id]);
            $request->merge([ 'checkIn' => $checkIn ]);
            $request->merge([ 'checkOut' => $checkOut ]);
            $this->validate($request, Reservation::$rules);
            $reservation = Reservation::findOrFail($id);
            if ($user->can('edit', $reservation)) {
                $reservation->update($request->all()); 
                $booked_rooms =  BookedRoom::where('reservation_id',$reservation->id)->get();
                foreach ($booked_rooms as $book_room) {
                 $booked_room =  BookedRoom::findOrFail($book_room->id);
                 $booked_room->delete();
             }
             $i = $checkIn;
             while($i<$checkOut){
                $data = [
                'reservation_id' => $reservation->id,
                'room_id' => $request->roomId,
                'hotel_id' => $hotel_id,
                'date' => $i,
                ];
                BookedRoom::create($data);
                $i = $i=date('Y-m-d',strtotime("+1 day", strtotime($i)));
            }
        }
    }     
    else{
        Session::flash('message',"This room is unavilable for that day.");
    }   
    return redirect()->route("reservation.index");
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
        $user = \Auth::user();
        $reservation  = Reservation::findOrFail($id);
        BookedRoom::where('reservation_id',$id)->delete();
        if ($user->can('destroy', $reservation)) {
            $reservation->delete();
        }
        return redirect()->route("reservation.index");
    }
}