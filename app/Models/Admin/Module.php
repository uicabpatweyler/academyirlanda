<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function options()
    {
        return $this->hasMany(Option::class)
            ->orderBy('opt_position','asc');
    }
}
