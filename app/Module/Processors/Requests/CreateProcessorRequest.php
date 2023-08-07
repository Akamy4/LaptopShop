<?php

declare(strict_types=1);

namespace App\Module\Processors\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProcessorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'brandId' => ['required', 'integer'],
            'typeId' => ['required', 'integer'],
            'modelId' => ['required', 'integer'],
            'core' => ['required', 'integer'],
            'thread' => ['required', 'integer'],
            'frequency' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'brandId.required' => 'dsfdfdsfs',
            'brandId.integer' => '11111111'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}

