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
        Gate::after(function($user, $permission){
            if ($user->permissions()->contains($permission)) {
                return true;
            }
        });
        Gate::after(function($user, $permission){
            if ($user->roles->pluck('name')->contains($permission)) {
                return true;
            }
        });
    }
}
