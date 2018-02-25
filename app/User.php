<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $rules =[
    'name' => 'required|string|max:255',
    'email' => 'required|string|email|max:255|unique:users',
    'password' => 'required|string|min:6|confirmed',
    'role' => 'required',
    ];

    protected $fillable = [
    'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     *///

    protected $hidden = [
    'password', 'remember_token',
    ];
    public function hotel(){
        return $this->hasOne('App\Hotel','user_id','id');
    }
    public function reservation(){
        return $this->belongsTo('App\Reservation');
    }

}
