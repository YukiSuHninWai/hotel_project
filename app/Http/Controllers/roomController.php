<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Room;
use App\RoomType;

class roomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware("auth");
        $this->middleware("admin",['only'=>['edit','update','delete','create','store']]);
    }
    

    public function index()
    {
        //
        $hotel_id = \Auth::user()->hotel->id;
        $rooms = Room::with('room_type1')->where('hotel_id',$hotel_id)->get();
        $room_count = Room::select('type', \DB::raw('count(*) as total'))->with('room_type1')->groupBy('type')->where('hotel_id',$hotel_id)->get();
        return view("room.index", compact("rooms","room_count")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $room_types = RoomType::pluck("type","id");
        return view("room.create", compact("room_types"));
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
        $hotel_id = \Auth::user()->hotel->id;
        $validated_data = $request->validate([
            'roomName' => 'required|string|max:255',
            'type' => 'required',
            'description'  => 'required|min:5',
            'price'  => 'required|numeric',
            ]);
        Room::create([
            'hotel_id'  => $hotel_id,
            'unit' => 'MMK',
            'type' => $validated_data['type'],
            'description'  => $validated_data['description'],
            'price'  => $validated_data['price'],
            'roomName' => $validated_data['roomName'],
            /*'category_id'   => $validated_data['category_id'],
            'user_id'   => \Auth::id()*/
            ]);
        return redirect()->route("rooms.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $room_type = RoomType::all();
        $room = Room::findOrFail($id);
        if ($user->can('update', $room)) {
            return view("room.edit", compact("room","room_type"));
        }
        return redirect()->back();
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
        //sssss
        $user = \Auth::user();
        $room = Room::findOrFail($id);
        if ($user->can('update', $room)) {
            $validated_data = $request->validate([
                'roomName' => 'required|string|max:255',
                'type' => 'required',
                'description'  => 'required|min:5',
                'price'  => 'required|numeric',
                /* 'category_id'   => 'required'*/
                ]);
            $room->update($validated_data);
            return redirect()->route("rooms.index");
        }
        else{
            return redirect()->back();
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
        $user = \Auth::user();
        $room = Room::findOrFail($id);
        if ($user->can('update', $room)) {
           $room->delete();
           return redirect()->route("rooms.index");
       }
       return redirect()->back();
   }
}