<?php

namespace App\Policies;

use App\Models\Admin\User;
use App\Models\Setting\School;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any schools.
     *
     * @param  \App\Models\Admin\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('schools.viewAny') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can view the school.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\School  $school
     * @return mixed
     */
    public function view(User $user, School $school)
    {
        //
    }

    /**
     * Determine whether the user can create schools.
     *
     * @param  \App\Models\Admin\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('schools.create') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can update the school.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\School  $school
     * @return mixed
     */
    public function update(User $user, School $school)
    {
        //
    }

    /**
     * Determine whether the user can delete the school.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\School  $school
     * @return mixed
     */
    public function delete(User $user, School $school)
    {
        //
    }

    /**
     * Determine whether the user can restore the school.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\School  $school
     * @return mixed
     */
    public function restore(User $user, School $school)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the school.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\School  $school
     * @return mixed
     */
    public function forceDelete(User $user, School $school)
    {
        //
    }
}
