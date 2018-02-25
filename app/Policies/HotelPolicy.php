<?php

namespace App\Policies;

use App\User;
use App\Hotel;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelPolicy
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
    public function index(){
        return ($user->is_Super);
    }
    public function create(){
        return ($user->is_Admin);
    }
    public function store(){
        return ($user->is_Admin);
    }
    public function edit(User $user,Hotel $hotel){
        return($user->hotel->id == $hotel->id);
    }
    public function update(User $user,Hotel $hotel){
        return($user->hotel->id == $hotel->id);
    }
    public function show(){
    }
    public function destroy(){
    }
}
