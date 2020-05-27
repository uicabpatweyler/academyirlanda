<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolService extends Model
{
    use SoftDeletes;

    protected $table    = 'school_services';
    protected $guarded  = [];
    protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
    protected $casts    = ['status' => 'boolean'];

    /*Relationships*/

    /*Relationships*/

    /**
     * Get the school type that owns the service.
     */
    public function type()
    {
        return $this->belongsTo(SchoolType::class,'school_type_id','id');
    }

    /**
     * Get the school level that owns the service
     */
    public function level()
    {
        return $this->belongsTo(SchoolLevel::class,'school_level_id','id');
    }
}
