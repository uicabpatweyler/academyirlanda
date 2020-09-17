<?php

namespace App\Policies;

use App\Models\Admin\User;
use App\Models\Setting\SchoolFee;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolFeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any school fees.
     *
     * @param  \App\Models\Admin\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('school_fees.viewAny') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can view the school fee.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolFee  $schoolFee
     * @return mixed
     */
    public function view(User $user, SchoolFee $schoolFee)
    {
        //
    }

    /**
     * Determine whether the user can create school fees.
     *
     * @param  \App\Models\Admin\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('school_fees.create') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can update the school fee.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolFee  $schoolFee
     * @return mixed
     */
    public function update(User $user, SchoolFee $schoolFee)
    {
        return $user->hasPermissionTo('school_fees.update') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can delete the school fee.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolFee  $schoolFee
     * @return mixed
     */
    public function delete(User $user, SchoolFee $schoolFee)
    {
        return $user->hasPermissionTo('school_fees.soft_delete') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can restore the school fee.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolFee  $schoolFee
     * @return mixed
     */
    public function restore(User $user, SchoolFee $schoolFee)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the school fee.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolFee  $schoolFee
     * @return mixed
     */
    public function forceDelete(User $user, SchoolFee $schoolFee)
    {
        //
    }
}
