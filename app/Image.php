<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public function hotel(){
    	$this->belongTo('App\Hotel','id','hotel_id');
    }
}
