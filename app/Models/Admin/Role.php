<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends \Spatie\Permission\Models\Role
{
    use SoftDeletes;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function scopeFilterRoles($query, $user)
    {
        if($user->hasPermissionTo('*.*')){
            return $query;
        }
        return $query->where('group','!=', 'super_administrador')
            ->orWhere('group','=', null);
    }
}
