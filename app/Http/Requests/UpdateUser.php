<?php

namespace App\Http\Requests;

use App\Models\Admin\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user->id)
            ]
        ];
    }

    public function messages()
    {
        return [
            'required'=> 'El campo es obligatorio.',
            'string'  => 'El campo debe ser una cadena de caracteres.',
            'email'   => 'El e-mail no es un correo válido',
            'max' => [
                'string'  => 'No debe ser mayor que :max caracteres.'
            ],
            'unique'    => 'Este e-mail ya ha sido registrado.'
        ];
    }

    public function updateUser(User $user, $password=null)
    {
        $user->fill([
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'email'      => $this->email
        ]);

        if($password!=null){
            $user->password = Hash::make($password);
        }

        $user->save();
    }
}
