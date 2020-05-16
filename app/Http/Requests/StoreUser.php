<?php

namespace App\Http\Requests;

use App\Models\Admin\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreUser extends FormRequest
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
            'first_name' => ['bail','required', 'string','min:3', 'max:255'],
            'last_name' => ['bail','required', 'string', 'min:3', 'max:255'],
            'email' => ['bail','required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['bail','required', 'string', 'min:8', 'confirmed']
        ];
    }

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
            'unique'    => 'Este e-mail ya ha sido registrado.'
        ];
    }

    public function createUser()
    {
        $user = User::create([
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'email'      => $this->email,
            'password'   => Hash::make($this->password)
        ]);

        $user->save();

        return $user;
    }
}
