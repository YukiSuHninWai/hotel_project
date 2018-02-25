<?php

namespace App\Policies;

use App\User;
use App\Room;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
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
        return ($user->is_Admin == true);
    }
    public function create(){

    }
    public function store(){

    }
    public function edit(User $user,Room $room){
        return ($user->hotel->id == $room->hotel_id);
    }
    public function update(User $user,Room $room){
        return ($user->hotel->id == $room->hotel_id);
    }
    public function show(User $user,Room $room){
        return ($user->hotel->id == $room->hotel_id);
    }
    public function destroy(User $user,Room $room){
        return ($user->hotel->id == $room->hotel_id);
    }
}
