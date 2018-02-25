<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
    'App\Model'         => 'Ais_superpp\Policies\ModelPolicy',
    'App\Hotel'         => 'App\Policies\HotelPolicy',
    'App\Hotel_facility' => 'App\Policies\HotelFacilityPolicy',
    'App\Facility'      => 'App\Policies\FacilityPolicy',
    'App\Room'          => 'App\Policies\RoomPolicy',
    'App\Reservation'   => 'App\Policies\ReservationPolicy',
    'App\User'          => 'App\Policies\UserPolicy',
    'App\Image'         => 'App\Policies\ImagePolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('is_super', function ($user, $blog) {
            return $user->id == $blog->user_id;
        });
        //
    }
}
