<?php

namespace App\Providers;

use App\Models\Admin\Role;
use App\Models\Admin\User;
use App\Models\Setting\SchoolCycle;
use App\Models\Setting\SchoolGrade;
use App\Policies\RolePolicy;
use App\Policies\SchoolCyclePolicy;
use App\Policies\SchoolGradePolicy;
use App\Policies\SchoolPolicy;
use App\Policies\UserPolicy;
use App\Models\Setting\School;
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
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        School::class => SchoolPolicy::class,
        SchoolCycle::class => SchoolCyclePolicy::class,
        SchoolGrade::class => SchoolGradePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Super Admin" role all permissions
//        Gate::before(function ($user, $ability) {
//            return $user->hasPermissionTo('*.*') ? true : null;
//        });
    }
}
