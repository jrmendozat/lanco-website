<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('IsAdmin-A', function($user){
            return $user->user_type == 'admin-A';
        });

        $gate->define('IsAdmin-B', function($user){
            return $user->user_type == 'admin-B';
        });
        

        $gate->define('IsAdmin-C', function($user){
            return $user->user_type == 'admin-C';
        });
        
        $gate->define('IsAdmin-D', function($user){
            return $user->user_type == 'admin-D';
        });

        $gate->define('IsUser', function($user){
            return $user->user_type == 'user';
        });

        $gate->define('IsCreator', function($user){
            return $user->user_type == 'createmode';
        });

        $gate->define('IsSuperAdmin', function($user){
            return $user->user_type == 'superadmin';
        });

        $gate->define('IsSell', function($user){
            return $user->user_type == 'sell';
        });

        $gate->define('IsDealer', function($user){
            return $user->user_type == 'dealer';
        });


        //
    }
}
