<?php

namespace App\Http\Requests;

use App\Models\Admin\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreRole extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $tableNames = config('permission.table_names');
        return [
            'display_name' => [
                'bail',
                'present',
                'required',
                'string',
                'min:4',
                'max:30',
                Rule::unique($tableNames['roles'])->where( function($query) {
                    return $query->where('display_name', $this->display_name);
                })
            ],
            'description' => [
                'bail',
                'present',
                'required',
                'string',
                'min:4'
            ],
            //'permissions' => 'required|min:1'
        ];
    }

    public function messages()
    {
        return [
            'present' => 'El campo nombre debe estar presente.',
            'required'  => 'El campo es obligatorio.',
            //'permissions.required' => 'Los permisos del rol son obligatorios',
            'string'  => 'El campo debe ser una cadena de caracteres.',
            'min'       => [
                'string'  => 'Debe contener al menos :min caracteres.'
            ],
            'max' => [
                'string'  => 'No debe ser mayor que :max caracteres.'
            ],
            'unique' => 'Este nombre de rol ya ha sido registrado.'
        ];
    }

    public function createRol()
    {
        $role = Role::create([
            'name'         => Str::snake($this->display_name),
            'display_name' => $this->display_name,
            'description'  => $this->description
        ]);

        $role->save();

        return $role;


    }
}
