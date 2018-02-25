<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;

class roomTypeController extends Controller
{
    //
     public function __construct(){
        //$this->middleware('superadmin');
    }
    public function index()
    {
        //
        $room_type = RoomType::orderBy('type')->paginate(5);
        return view('room_type.index',compact('room_type'));

    }
    public function create()
    {
        //
        return view('room_type.create');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request,RoomType::$rules);
        $room_type = [
        'type' => $request->type,
        ];
        RoomType::create($room_type);
        return redirect('room_type');
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
        $room_type = RoomType::findOrFail($id);
        return view('room_type.edit',compact('room_type'));
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
        $this->validate($request,RoomType::$rules);
        $room_type = RoomType::findOrFail($id);
        $room_type->update($request->all());
        return redirect('room_type');
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
        $room_type = RoomType::findOrFail($id);
        $room_type->delete();
        return redirect('room_type');
    }
}
