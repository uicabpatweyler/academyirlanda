<?php

namespace App\Http\Requests;

use App\Models\Setting\SchoolGrade;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSchoolGrade extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return $this->user()->hasPermissionTo('school_grades.update') || $this->user()->hasPermissionTo('*.*');
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
        'name' => [
          'bail',
          'present',
          'required',
          'string',
          'min:3',
          'max:120',
          Rule::unique('school_grades')->where(function ($query) {
            return $query->where('school_id', $this->school_id)
              ->where('name', $this->name);
          })->ignore($this->school_grade->id)
        ],
        'abreviation' => ['bail', 'present', 'required', 'string', 'min:1', 'max:60']
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
        'string' => 'No es un nombre valido',
        'name.min'       => [
          'string'  => 'Minimo :min caracteres.'
        ],
        'max' => [
          'string'  => 'El nombre no puede ser más :max caracteres.'
        ],
        'unique'    => 'Este nombre para el grado ya existe.'
      ];
    }

    public function updateSchoolGrade(SchoolGrade $schoolGrade)
    {
      $schoolGrade->fill([
        'school_id' => $this->school_id,
        'name' => $this->name,
        'abreviation' => $this->abreviation,
        'user_updated' => $this->user()->id
      ]);

      $schoolGrade->save();
    }
}
