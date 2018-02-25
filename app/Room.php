<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public static $rules = [
    	'roomName' => 'required|string|max:255',
    	'description' => 'required|string',
    	'price' => 'required|float',
    ];
     protected $fillable = ['hotel_id','roomName','type','description','price','unit'];
     public function hotel(){
     	return $this->belongsTo('App\Hotel');
     }
     public function Reservation(){
     	return $this->belongsTo('App\Reservation');
     }
     public function room_type1(){
        return $this->hasOne('App\RoomType','id','type');
     }
     public function booked_room(){
        return $this->hasMany('App\BookedRoom','room_id','id');
     }
     public function room_type(){
        return $this->belongsTo('App\RoomType');
     }
}
