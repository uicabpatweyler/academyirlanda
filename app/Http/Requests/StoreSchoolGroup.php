<?php

namespace App\Http\Requests;

use App\Models\Setting\SchoolGroup;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSchoolGroup extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'school_id'       => ['bail', 'present', 'required'],
          'school_cycle_id' => ['bail', 'present', 'required'],
          'school_grade_id' => ['bail', 'present', 'required'],
          'fee_one'         => ['bail', 'present', 'required'],
          'fee_two'         => ['bail', 'present', 'required'],
          'name'            => [
            'bail',
            'present',
            'required',
            'min:3',
            'max:30',
            Rule::unique('school_groups')->where( function ($query) {
              return $query->where('school_id', $this->school_id)
                ->where('school_cycle_id', $this->school_cycle_id)
                ->where('school_grade_id', $this->school_grade_id)
                ->where('name', $this->name);
            })
          ],
          'allowed_students' => ['bail', 'present', 'required']
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
          'string'  => 'Debe contener al menos :min caracteres.'
        ],
        'max' => [
          'string'  => 'No debe ser mayor que :max caracteres.'
        ],
        'unique'    => 'Este nombre de grupo ya existe.'
      ];
    }

    public function createSchoolGroup()
    {
      $schoolGroup = SchoolGroup::create([
        'school_id' => $this->school_id,
        'school_cycle_id' => $this->school_cycle_id,
        'school_grade_id' => $this->school_grade_id,
        'fee_one' => $this->fee_one,
        'fee_two' => $this->fee_two,
        'name' => $this->name,
        'allowed_students' => $this->allowed_students,
        'status' => true,
        'user_created' => $this->user()->id,
        'user_updated' => $this->user()->id
      ]);

      $schoolGroup->save();
    }
}
