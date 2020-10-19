<?php

namespace App\Policies;

use App\Models\Admin\User;
use App\Models\Setting\SchoolGroup;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolGroupPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
      return $user->hasPermissionTo('school_groups.viewAny') || $user->hasPermissionTo('*.*');
    }

    public function view(User $user, SchoolGroup $schoolGroup)
    {
        return false;
    }

    public function create(User $user)
    {
      return $user->hasPermissionTo('school_groups.create') || $user->hasPermissionTo('*.*');
    }

    public function update(User $user, SchoolGroup $schoolGroup)
    {
      return $user->hasPermissionTo('school_groups.update') || $user->hasPermissionTo('*.*');
    }

    public function delete(User $user, SchoolGroup $schoolGroup)
    {
        return $user->hasPermissionTo('school_groups.soft_delete') || $user->hasPermissionTo('*.*');
    }


    public function restore(User $user, SchoolGroup $schoolGroup)
    {
        //
    }

    public function forceDelete(User $user, SchoolGroup $schoolGroup)
    {
        //
    }
}
