<?php

declare(strict_types=1);

namespace App\Module\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUserRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email,' . $this->route('id')],
            'password' => ['required', 'string', 'min:8'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'regex:/^\+7\d{10}$/', 'unique:users,email,' . $this->route('id')],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имя является обязательным',
            'surname.required' => 'Поле имя является обязательным',
            'email.required' => 'Поле email является обязательным',
            'email.email' => 'Неправильный формат email',
            'email.unique' => 'Пользователь с таким email уже существует',
            'password.required' => 'Поле пароль является обязательным',
            'password.min' => 'Минимальная длина пароля - 8 символов',
            'phone.required' => 'Поле имя является обязательным',
            'phone.regex' => 'Неправильный формат телефона, напишите через: +7##########',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}

