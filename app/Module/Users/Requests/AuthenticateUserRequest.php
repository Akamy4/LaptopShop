<?php

declare(strict_types=1);

namespace App\Module\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use libphonenumber\PhoneNumberUtil;

class AuthenticateUserRequest extends FormRequest
{

    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Поле email является обязательным',
            'email.email' => 'Неправильный формат email',
            'password.required' => 'Поле пароль является обязательным',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}

