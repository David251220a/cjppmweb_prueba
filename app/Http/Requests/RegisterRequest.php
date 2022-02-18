<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'sex' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required',
            'document_number' => 'required',
            'birthday' => 'required|date',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'lastname' => 'apellido',
            'sex' => 'sexo',
            'email' => 'correo electronico',
            'phone' => 'telefono',
            'password' => 'contraseña',
            'document_number' => 'documento',
            'birthday' => 'fecha de nacimiento',
        ];
    }
}
