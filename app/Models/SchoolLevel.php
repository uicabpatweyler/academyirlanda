<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolLevel extends Model
{
    use SoftDeletes;

    protected $table    = 'school_levels';
    protected $guarded  = [];
    protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
    protected $casts    = ['status' => 'boolean'];

    /*Relationships*/

    /**
     * Get the school type that owns the level.
     */
    public function type()
    {
        return $this->belongsTo(SchoolType::class,'school_type_id','id');
    }

    /**
     * Get the services type for the school level
     */
    public function services()
    {
        return $this->hasMany(SchoolService::class);
    }

}
