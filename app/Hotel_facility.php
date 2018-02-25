<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel_facility extends Model
{
    //
	protected $fillable =[ 'hotel_id','facility'];
	protected $casts = ['facility' => 'array'];

}
