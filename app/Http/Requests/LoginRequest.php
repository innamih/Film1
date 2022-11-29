<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
             'email'=>'required',
            'password'=>'required'         
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'Поле email должно быть заполнено',
            'password.required'=>'Поле пароль должно быть заполнено',
    ];
}  
}
