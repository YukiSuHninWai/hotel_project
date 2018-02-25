<?php

namespace App\Policies;

use App\User;
use App\Reservation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
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
        return ($user->is_Admin==true);
    }
    public function create(){

    }
    public function store(){
        
    }
    public function edit(User $user,Reservation $reservation){
        return($user->id == $reservation->customerId);
    }
    public function update(User $user,Reservation $reservation){
        return ($user->id == $reservation->customerId);
    }
    public function show(){
        return ($user->id == $reservation->customerId);
    }
    public function destroy(User $user,Reservation $reservation){
        return ($user->id == $reservation->customerId);
    }
}
