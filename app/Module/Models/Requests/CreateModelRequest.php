<?php

declare(strict_types=1);

namespace App\Module\Models\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateModelRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'dfsdfsdfsdf'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}

