<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolGroup extends Model
{
  use SoftDeletes;
  protected $table    = 'school_groups';
  protected $guarded  = [];
  protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
  protected $casts    = ['status' => 'boolean'];

  /* Local scope, filter by school*/
  public function scopeBySchool($query, $school)
  {
    return $query->where('school_id',$school);
  }

  /* Local scope, filter by school cycle*/
  public function scopeByCycle($query, $cycle)
  {
    $query->where('school_cycle_id', $cycle);
  }

  /* Local scope, filter by school cycle*/
  public function scopeByGrade($query, $grade)
  {
    $query->where('school_grade_id', $grade);
  }

  /* Local scope, filter by status*/
  public function scopeByStatus($query, $status)
  {
    if($status!="" || $status!=null)
    {
      return $query->where('status', $status);
    }
    return $query;
  }

  /*Mutators*/
  public function setNameAttribute($value)
  {
    $this->attributes['name'] = mb_strtoupper($value);
  }

  /**
   * Get the school grade owns the school group
   */
  public function schoolGrade()
  {
    return $this->belongsTo(SchoolGrade::class,'school_grade_id','id');
  }

  /**
   * Get the school fee that owns the school group
   */
  public function schoolFeeOne()
  {
    return $this->belongsTo(SchoolFee::class,'fee_one', 'id');
  }

  /**
   * Get the school fee that owns the school group
   */
  public function schoolFeeTwo()
  {
    return $this->belongsTo(SchoolFee::class,'fee_two', 'id');
  }
}
