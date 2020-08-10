<?php

namespace App\Policies;

use App\Models\Admin\User;
use App\Models\Setting\SchoolCycle;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolCyclePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any school cycles.
     *
     * @param  \App\Models\Admin\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('school_cycles.viewAny') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can view the school cycle.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolCycle  $schoolCycle
     * @return mixed
     */
    public function view(User $user, SchoolCycle $schoolCycle)
    {
        //
    }

    /**
     * Determine whether the user can create school cycles.
     *
     * @param  \App\Models\Admin\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('school_cycles.create') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can update the school cycle.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolCycle  $schoolCycle
     * @return mixed
     */
    public function update(User $user, SchoolCycle $schoolCycle)
    {
      return $user->hasPermissionTo('school_cycles.update') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can delete the school cycle.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolCycle  $schoolCycle
     * @return mixed
     */
    public function delete(User $user, SchoolCycle $schoolCycle)
    {
      return $user->hasPermissionTo('school_cycles.soft_delete') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can restore the school cycle.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolCycle  $schoolCycle
     * @return mixed
     */
    public function restore(User $user, SchoolCycle $schoolCycle)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the school cycle.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolCycle  $schoolCycle
     * @return mixed
     */
    public function forceDelete(User $user, SchoolCycle $schoolCycle)
    {
        //
    }
}
