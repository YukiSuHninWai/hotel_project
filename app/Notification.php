<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $rules = [
    	'hotel_id' => 'required|integer',
    	'content' => 'required|string|max:255',
    ];
    protected $fillable = [
    'hotel_id','content'];
}
