<?php

namespace App\Policies;

use App\Models\Admin\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('users.viewAny') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        if($model->hasRole('super_administrador') ){
            return  $user->hasPermissionTo('*.*');
        }
        if(!$model->hasRole('super_administrador') ){
            return $user->hasPermissionTo('users.view') || $user->hasPermissionTo('*.*');
        }

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('users.create') || $user->hasPermissionTo('*.*');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        if($model->hasRole('super_administrador') ){
            return  $user->hasPermissionTo('*.*');
        }
        if(!$model->hasRole('super_administrador') ){
            return $user->hasPermissionTo('users.update') || $user->hasPermissionTo('*.*');
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        if($user->id != $model->id)
        {
            return $user->hasPermissionTo('users.soft_delete') || $user->hasPermissionTo('*.*');
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
