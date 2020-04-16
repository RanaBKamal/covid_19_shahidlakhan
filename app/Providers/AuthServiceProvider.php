<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //gate registration for employee
        // definations for the menus of the page
        Gate::define('employee-content', function($user){
            if($user->role->name == 'employee'){
              return true;
            }
            return false;
        });
        // gate for user
        Gate::define('user-content', function($user){
            if($user->role->name == 'user'){
              return true;
            }
            return false;
        });
    }
}
