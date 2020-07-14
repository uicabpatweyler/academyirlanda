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
            'email'   => 'El e-mail no es un correo válido',
            'min'       => [
                'string'  => 'Debe contener al menos :min caracteres.'
            ],
            'max' => [
                'string'  => 'No debe ser mayor que :max caracteres.'
            ],
            'unique'    => 'Esta clave ya ha sido registrada.'
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
            'street' => $this->street,
            'exterior_number' => $this->exterior_number,
            'interior_number' => $this->interior_number,
            'references' => $this->references,
            'settlement' => $this->settlement,
            'postal_code' => $this->postal_code,
            'entity' => $this->entity,
            'town' => $this->town,
            'location' => $this->location,
            'country' => $this->country,
            'user_updated' => $this->user()->id
        ]);

        $school->save();
    }
}
