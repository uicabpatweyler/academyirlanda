<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolType extends Model
{
    use SoftDeletes;

    protected $table    = 'school_types';
    protected $guarded  = [];
    protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
    protected $casts    = ['status' => 'boolean'];

    /*Relationships*/

    /**
     * Get the levels for the school of type.
     */
    public function levels()
    {
        return $this->hasMany(SchoolLevel::class);

    }

    /**
     * Get the services for the school of type
     */
    public function services()
    {
        return $this->hasMany(SchoolService::class);
    }
}
