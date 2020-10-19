<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolFee extends Model
{
    use SoftDeletes;
    protected $table    = 'school_fees';
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

    /* Local scope, filter by type*/
    public function scopeByType($query, $type)
    {
      $query->where('type', $type);
    }

    /* Local scope, filter by status*/
    public function scopeByStatus($query, bool $status)
    {
      return $query->where('status', $status);
    }

    /*Mutators, accessor, define the display name in the listings*/
    public function getTypeNameAttribute()
    {
      if($this->type === 1) { return 'Cuota de Inscripción';}
      if($this->type === 2) { return 'Cuota de Colegiatura';}
      return '';
    }

    /*Mutators, accessor, use only to show. */
    public function getAmountFormatAttribute()
    {
      return '$ '.number_format($this->amount, 2,'.', ',');
    }

    /**
     * Relationship
     * Get the school cycle that owns the school fee.
     */
    public function schoolCycle()
    {
      return $this->belongsTo(SchoolCycle::class,'school_cycle_id', 'id');
    }

    /**
     * Relationship
     * Get the school name that owns the school fee
     */
    public function school()
    {
      return $this->belongsTo(School::class, 'school_id', 'id');
    }

    /*
     * Relationship
     * Get the school groups for the school fee
     */
  public function schoolGroup()
  {
    return $this->hasMany(SchoolGroup::class);
  }
}
