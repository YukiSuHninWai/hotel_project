<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hotel;
use App\Facility;

class hotelFacilityController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $hotel_id = \Auth::user()->hotel->id;    
        $hotel = Hotel::find($hotel_id)->load('facility');
        return view('hotel_facility.index')->with('hotel',$hotel);
    }
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
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
       
        $hotel = Hotel::find($id)->load('facility');
        return view("hotel_facility.edit")->with("hotel", $hotel);
    }
    public function update(Request $request, $id)
    { 
        $id = \Auth::id();
        $hotel = Hotel::where('user_id', $id)->get()->first();
        $data = $request->except('_token','_method');
        foreach($data as $key=>$row){
            $hotel->facility()->updateExistingPivot($key, ['data' => $row]);
        }       
        return redirect()->route("hotel_facility.index");
    }
    public function destroy($id)
    {
        //
    }
}
