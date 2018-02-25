<?php

namespace App\Policies;

use App\User;
use App\Hotel_facility;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelFacilityPolicy
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
    public function index(User $user, Hotel_facility $hf){
        return true;
    }
    public function create(){

    }
    public function store(){

    }
    public function edit(){

    }
    public function update(User $user,$id){
        
    }
    public function show(){

    }
    public function destroy(){
        
    }
}
