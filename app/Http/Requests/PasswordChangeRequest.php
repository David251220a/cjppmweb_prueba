<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required',
            'newpassword' => 'required|min:8',
            'repassword' => 'required|same:newpassword',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'contraseña actual',
            'newpassword' => 'nueva contraseña',
            'repassword' => 'repetir nueva contraseña',
        ];
    }
}
