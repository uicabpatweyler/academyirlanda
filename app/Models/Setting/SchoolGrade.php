<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolGrade extends Model
{
  use SoftDeletes;

  protected $table    = 'school_grades';
  protected $guarded  = [];
  protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
  protected $casts    = ['status' => 'boolean'];

  /* Local scope, filter by status*/
  public function scopeStatus($query, bool $status)
  {
    return $query->where('status', $status);
  }

  public function setNameAttribute($value)
  {
    $this->attributes['name'] = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
  }

  public function setAbreviationAttribute($value)
  {
    $this->attributes['abreviation'] = mb_convert_case($value, MB_CASE_UPPER, "UTF-8");
  }

  /*
   * Get the school that owns the school grade
   */
  public function school()
  {
    return $this->belongsTo(School::class,'school_id','id');
  }

  /*
   * Get the school groups for the school grade
   */
  public function schoolGroups()
  {
    return $this->hasMany(SchoolGroup::class);
  }
}
