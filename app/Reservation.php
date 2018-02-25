<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public static $rules=[
        'roomId' => 'required|integer|min:1|max:255',
        'checkIn' => 'required|date|after:today',
        'checkOut' => 'required|after:today',
        'customerId' => 'required|integer',
        'hotelId' => 'integer',
    ];
	protected $fillable = [
    'roomId', 'hotelId','customerId', 'checkIn', 'checkOut',
    ];
    //
    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }
    public function user(){
    	return $this->hasMany('App\User','id','customerId');
    }
    public function room(){
        return $this->hasOne('App\Room','id','roomId');
    }
    public function hotel1(){
        return $this->hasOne('App\Hotel','id','hotelId');
    }
    public function bookedRoom(){
        $this->belongsTo('App\BookedRoom');
    }
}
