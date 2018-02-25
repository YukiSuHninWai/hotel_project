<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hotel;
use App\Notification;
use App\Facility;
use App\HotelImage;
use App\Room;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only'=>['create','store','edit','update']]);
    }
    public function index()
    {   
        //
      $user = \Auth::user();
      if($user->role == 'admin'){
          $hotel = Hotel::where('user_id', $user->id)->get()->first();
          if(empty($hotel)){            
           return view("index.create");      
       }
        return view("index.show")->with("hotel", $hotel);//cannot redirect after query result
    }
    elseif($user->role == 'customer'){
        return redirect()->route('homepage');
    }
    $hotels = Hotel::paginate(10);
    return view("index.index")->with('hotels',$hotels);
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
        $this->validate($request, Hotel::$rules);
        $request->merge([ 'user_id' => \Auth::id()]);        
        $hotel = Hotel::create([
            'user_id' => \Auth::id(),
            'hotelname' => $request->hotelname,
            'starRating' =>  $request->starRating,
            'noOfRoom' =>  $request->noOfRoom,
            'city' =>  $request->city,
            'description' =>$request->description,
            'country' =>  $request->country,
            'address' =>  $request->address,
            'phoneNumber' =>  $request->phoneNumber,
            'latitude' => 0.0,
            'longitude' => 0.0,
            ]);
        $facilities = Facility::all();
        foreach($facilities as $facility){
            $hotel->facility()->attach($facility->id, ['data' => false]);
        }
        return redirect()->route('index.index');
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
       // $hotel = Hotel::findOrFail($id);
        $images = HotelImage::where('hotel_id',$id)->get();
        $room_count = Room::select('type', \DB::raw('count(*) as total'))->with('room_type1')->groupBy('type')->where('hotel_id',$id)->get();
        $hotel = Hotel::find($id)->load('facility');  
        if(\Auth::user()=='admin') {
            return view('index.profile',compact('hotel','images','room_count'));
        } 
        return view('index.show',compact('hotel','images','room_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $user = \Auth::user();
        $hotel= Hotel::where('id',$id)->get()->first();
        $hotel = Hotel::findOrFail($id);        
        if ($user->can('edit', $hotel)) {
            return view("index.edit")->with("hotel", $hotel);
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
     $user = \Auth::user();
     $this->validate($request, Hotel::$rules);
     $hotel = Hotel::findOrFail($id);
     $hotel->update($request->all());
     if ($user->can('update', $hotel)) {
         return redirect()->route("index.index");
     }
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
}
