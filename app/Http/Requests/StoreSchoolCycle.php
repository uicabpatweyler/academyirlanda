<?php

namespace App\Http\Requests;

use App\Models\Setting\SchoolCycle;
use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolCycle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermissionTo('school_cycles.create') || $this->user()->hasPermissionTo('*.*');
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
                'unique:school_cycles'
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

    public function createSchoolCycle()
    {
        $period = SchoolCycle::create([
            'period' => $this->period,
            'status' => true,
            'user_created' => $this->user()->id,
            'user_updated' => $this->user()->id
        ]);

        $period->save();
    }
}
