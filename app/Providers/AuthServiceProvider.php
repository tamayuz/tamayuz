<?php

namespace App\Providers;

use App\Admin;
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
        Gate::define('full_access', function () {
            $admin_ids = Admin::all()->pluck('user_id');
            return $admin_ids->contains(auth()->user()->id);
        });

        Gate::define('createProject','App\Policies\ProjectPolicy@createProject');
        Gate::define('deleteProject','App\Policies\ProjectPolicy@deleteProjcet');
        Gate::define('updateProject','App\Policies\ProjectPolicy@updateProject');




    }
}
