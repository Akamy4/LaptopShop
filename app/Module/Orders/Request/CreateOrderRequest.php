<?php

declare(strict_types=1);


namespace App\Module\Orders\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

final class CreateOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'userId' => ['required', 'integer'],
            'totalPrice' => ['required', 'integer'],
            'laptop' => ['required', 'array'],
            'laptop.*.id' => ['required', 'integer'],
            'laptop.*.quantity' => ['required', 'integer'],
            'laptop.*.unitPrice' => ['required', 'integer'],
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
