<?php

namespace App\Http\Requests;

use App\Models\Setting\SchoolFee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSchoolFee extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return $this->user()->hasPermissionTo('school_fees.update') || $this->user()->hasPermissionTo('*.*');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'school_id' => ['bail', 'present', 'required'],
        'school_cycle_id' => ['bail', 'present', 'required'],
        'name' => [
          'bail',
          'present',
          'string',
          'required',
          'min:3',
          'max:120',
          Rule::unique('school_fees')->where( function($query) {
            return $query->where('school_id', $this->school_id)
              ->where('school_cycle_id', $this->school_cycle_id)
              ->where('name', $this->name);
          })->ignore($this->school_fee->id)
        ],
        'type' => ['bail', 'present', 'required'],
        'amount' => ['bail', 'present', 'required']
      ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
      return [
        'required'=> 'El campo es obligatorio.',
        'string'  => 'El campo debe ser una cadena de caracteres.',
        'min'       => [
          'string'  => 'Debe contener al menos :min caracteres.'
        ],
        'max' => [
          'string'  => 'No debe ser mayor que :max caracteres.'
        ],
        'unique'    => 'Este nombre de cuota ya existe.'
      ];
    }

    public function updateSchoolFee(SchoolFee $schoolFee)
    {
      $schoolFee->fill([
        'school_id' => $this->school_id,
        'school_cycle_id' => $this->school_cycle_id,
        'name' => $this->name,
        'type' => $this->type,
        'amount' => $this->amount,
        'user_updated' => $this->user()->id
      ]);

      $schoolFee->save();
    }
}
