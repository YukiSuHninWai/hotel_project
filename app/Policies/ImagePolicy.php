<?php

namespace App\Policies;

use App\User;
use App\Image;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function index(User $user){
        return($user->is_Admin == true);
    }
    public function create(){

    }
    public function store(){

    }
    public function edit(){
       // return ($user->hotel->id == $image->hotel_id);
        return true;
    }
    public function update(){
        return ($user->hotel->id == $image->hotel_id);
    }
    public function show(){
        return ($user->hotel->id == $image->hotel_id);
    }
    public function destroy(){
        return ($user->hotel->id == $image->hotel_id);
    }
}
