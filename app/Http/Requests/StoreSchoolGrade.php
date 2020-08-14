<?php

namespace App\Http\Requests;

use App\Models\Setting\SchoolGrade;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSchoolGrade extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return $this->user()->hasPermissionTo('school_grades.create') || $this->user()->hasPermissionTo('*.*');
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
                  ->where('name', $this->name)
                  ->where('abreviation', $this->abreviation);
              })
            ],
          'abreviation' => ['bail', 'present', 'required', 'string', 'min:1', 'max:60']
        ];
    }

    public function createSchoolGrade()
    {
      $schoolGrade = SchoolGrade::create([
        'school_id' => $this->school_id,
        'name' => $this->name,
        'abreviation' => $this->abreviation,
        'status' => true,
        'user_created' => $this->user()->id,
        'user_updated' => $this->user()->id
      ]);

      $schoolGrade->save();
    }
}
