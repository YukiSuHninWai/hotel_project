<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
    }
    public function create(){

    }
    public function store(){

    }
    public function edit(User $user,User $edit_user){
        return ($user->id == $edit_user->id);
    }
    public function update(User $user,User $update_user){
        return ($user->id == $update_user->id);
    }
    public function show(User $user,User $show_user){
        return ($user-->id == $show_user->id);
    }
    public function destroy(User $user,User $des_user){
        return ($des_user->role != 'super');
    }
}
