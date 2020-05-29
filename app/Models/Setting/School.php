<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    protected $table    = 'schools';
    protected $guarded  = [];
    protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
    protected $casts    = ['status' => 'boolean'];

    /*Mutators*/

    public function setKey($value)
    {
        $this->attributes['key'] = mb_strtoupper($value);
    }
}
