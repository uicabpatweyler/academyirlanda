<?php

namespace App\Models\Setting;

use App\Models\SchoolLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    protected $table    = 'schools';
    protected $guarded  = [];
    protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
    protected $casts    = ['status' => 'boolean'];

    /*
     * Local Scopes
     */
    public function scopeStatus($query, bool $status)
    {
        return $query->where('status', $status);
    }

    /*Mutators*/

    public function setKey($value)
    {
        $this->attributes['key'] = mb_strtoupper($value);
    }

    public function setIncorporation($value)
    {
        $this->attributes['incorporation'] = mb_strtoupper($value);
    }

    /*
     * Get the level that owns the school
     */
    public function level()
    {
        return $this->belongsTo(SchoolLevel::class,'school_level_id', 'id');
    }

}
