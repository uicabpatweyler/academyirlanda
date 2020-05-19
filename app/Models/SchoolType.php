<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolType extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
    protected $casts    = ['status' => 'boolean'];
}
