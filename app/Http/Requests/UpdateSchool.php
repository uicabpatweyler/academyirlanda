<?php

namespace App\Http\Requests;

use App\Models\Setting\School;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSchool extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermissionTo('schools.update') || $this->user()->hasPermissionTo('*.*');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'key' => [
                'bail',
                'present',
                'required',
                'min:10',
                'max:10',
                Rule::unique('schools')->ignore($this->school->id),
            ],
            'incorporation' => ['bail','present', 'max:11'],
            'name' => [
                'bail',
                'present',
                'required',
                'string',
                'min:3',
                'max:120'
            ],
            'school_type_id' => ['bail', 'present', 'required'],
            'school_level_id' => ['bail', 'present', 'required'],
            'school_service_id' => ['bail', 'present', 'required'],
            'work_shift' => ['bail', 'present', 'required'],
            'economic_support' => ['bail', 'present', 'required'],
            'email' => ['bail', 'present'],
            'office_phone' => ['bail', 'present'],
        ];
    }

    public function updateSchool(School $school)
    {
        $school->fill([
            'key' => $this->key,
            'incorporation' => $this->incorporation,
            'name' => $this->name,
            'school_type_id' => $this->school_type_id,
            'school_level_id' => $this->school_level_id,
            'school_service_id' => $this->school_service_id,
            'work_shift' => $this->work_shift,
            'economic_support' => $this->economic_support,
            'email' => $this->email,
            'office_phone' => $this->office_phone,
            'user_updated' => $this->user()->id
        ]);

        $school->save();
    }
}
