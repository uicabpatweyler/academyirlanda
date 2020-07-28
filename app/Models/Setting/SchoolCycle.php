<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolCycle extends Model
{
    use SoftDeletes;

    protected $table    = 'school_cycles';
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
}
