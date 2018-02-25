<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    //
    public static $rules=[
    	'type' =>'required|String|unique:room_types',
    ];
    protected $fillable = [
		'type',
    ];
    // public function room(){
    // 	return $this->belongsTo('App\RoomType');
    // }
    public function room(){
    	return $this->hasMany('App\Room','type','id');
    }
}
