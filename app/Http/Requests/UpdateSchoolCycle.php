<?php

namespace App\Http\Requests;

use App\Models\Setting\SchoolCycle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSchoolCycle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return $this->user()->hasPermissionTo('school_cycles.update') || $this->user()->hasPermissionTo('*.*');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'period' => [
          'bail',
          'present',
          'required',
          'min:9',
          'max:9',
          Rule::unique('school_cycles')->ignore($this->school_cycle->id)
        ]
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
        'min'       => [
          'string'  => 'El ciclo deben ser :min caracteres.'
        ],
        'max' => [
          'string'  => 'El ciclo no puede ser más :max caracteres.'
        ],
        'unique'    => 'Este ciclo escolar ya existe.'
      ];
    }

    public function updateSchoolCycle(SchoolCycle $schoolCycle)
    {
      $schoolCycle->fill([
        'period' => $this->period,
        'user_updated' => $this->user()->id
      ]);

      $schoolCycle->save();
    }
}
