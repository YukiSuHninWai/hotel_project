<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facility;
use App\Hotel;

class facilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        //$this->middleware('superadmin');
    }
    public function index()
    {
        //
        $facilities = Facility::orderBy('facility')->paginate(10);
        return view('facility.index',compact('facilities'));

    }
    public function create()
    {
        //
        return view('facility.create');
    }

    public function store(Request $request)
    {
        //
        $hotels = Hotel::all();
        $facility = [
        'facility' => $request->facility,
        'category' => null,
        ];
        $f = Facility::create($facility);
        foreach($hotels as $hotel){
            $f->hotel()->attach($hotel->id, ['data' => false]);
        }
        return redirect('facility');
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
        $facility = Facility::findOrFail($id);
        return view('facility.show',compact('facility'));
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
        $facility = Facility::findOrFail($id);
        return view('facility.edit',compact('facility'));
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
        $facility = Facility::findOrFail($id);
        $facility->update($request->all());
        return redirect('facility');
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
        $facility = Facility::findOrFail($id);
        $facility->delete();
        return redirect('facility');
    }
}
