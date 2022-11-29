<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
       /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:6|confirmed'         
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Поле имя должно быть заполнено',
            'email.required'=>'Поле email должно быть заполнено',
            'email.unique'=>'Поле c таким email уже зарегистрирован',
            'password.required'=>'Поле пароль должно быть заполнено',
            'password.min'=>'Длина пароля должна быть не менее 6 симлов',
            'password.confirmed'=>'Пароль и подтверждение пароля не совпадают'
    ];
}  
}
