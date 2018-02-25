<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    //
    public static $rules = [
    	'facility' => 'required|string|unique:facilities',
    ];
	protected $fillable = ['facility'];
	public function hotel(){
		return $this->belongsToMany('App\Hotel', 'hotel_facility','facility_id','hotel_id')->withPivot('data')->withTimestamps();  
	}
}
