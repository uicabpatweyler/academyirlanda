<?php

namespace App\Policies;

use App\Models\Admin\User;
use App\Models\Setting\SchoolGrade;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolGradePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any school grades.
     *
     * @param  \App\Models\Admin\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
      return $user->hasPermissionTo('school_grades.viewAny') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can view the school grade.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolGrade  $schoolGrade
     * @return mixed
     */
    public function view(User $user, SchoolGrade $schoolGrade)
    {
        //
    }

    /**
     * Determine whether the user can create school grades.
     *
     * @param  \App\Models\Admin\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      return $user->hasPermissionTo('school_grades.create') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can update the school grade.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolGrade  $schoolGrade
     * @return mixed
     */
    public function update(User $user, SchoolGrade $schoolGrade)
    {
        //
    }

    /**
     * Determine whether the user can delete the school grade.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolGrade  $schoolGrade
     * @return mixed
     */
    public function delete(User $user, SchoolGrade $schoolGrade)
    {
        //
    }

    /**
     * Determine whether the user can restore the school grade.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolGrade  $schoolGrade
     * @return mixed
     */
    public function restore(User $user, SchoolGrade $schoolGrade)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the school grade.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Setting\SchoolGrade  $schoolGrade
     * @return mixed
     */
    public function forceDelete(User $user, SchoolGrade $schoolGrade)
    {
        //
    }
}
