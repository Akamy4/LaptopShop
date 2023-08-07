<?php

declare(strict_types=1);

namespace App\Module\Laptops\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateLaptopRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'brandId' => ['required', 'integer'],
            'processorId' => ['required', 'integer'],
            'videoCardId' => ['required', 'integer'],
            'ramMemory' => ['required', 'integer'],
            'memory' => ['required', 'integer'],
            'diagonal' => ['required', 'numeric'],
            'screenResolution' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'image' => ['required'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}

