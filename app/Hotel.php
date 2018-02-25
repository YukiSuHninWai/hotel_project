<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Hotel extends Model
{
    //
        public static $rules = [
        'user_id' => 'integer',
        'hotelname' => 'required|min:1|max:255',
        'starRating' => 'required',
        'noOfRoom' =>'required',
        'country' => 'required|min:1|max:255',
        'phoneNumber' => 'required|max:20',
        
        
    ];
    protected $fillable = [
    'user_id','hotelname','starRating','noOfRoom','route','street_number','locality','state','description','phoneNumber','city','country'];

	public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function room(){
        return $this->hasMany('App\Room','hotel_id','id');
    }
    public function room_count(){
        return $this->hasMany('App\Room','hotel_id','id');
    }
    public function image(){
        return $this->hasMany('App\HotelImage','hotel_id','id');
    }
    public function facility(){
    	return $this->belongsToMany('App\Facility', 'hotel_facility','hotel_id','facility_id')->withPivot('data')->withTimestamps();   
    }
    public function bookedRoom(){
        return $this->hasMany('App\BookedRoom','hotel_id','id');
    }
}
