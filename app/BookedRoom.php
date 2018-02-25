<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookedRoom extends Model
{
    //
    protected $fillable = [
    'date','hotel_id','room_id','reservation_id'];
    public function reservation(){
    	return $this->hasMany('App\Reservation','id','reservation_id');
    }
    public function room(){
    	return $this->hasMany('App\Room','id','room_id');
    }
    public function hotel(){
    	return $this->belongsTo('App\Hotel');
    }
}
