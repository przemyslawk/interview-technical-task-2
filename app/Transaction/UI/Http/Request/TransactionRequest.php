<?php

declare(strict_types=1);

namespace App\Transaction\UI\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class TransactionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'source' => [
                Rule::in(['csv', 'db']),
                'required',
                'string'
            ],
            'page' => 'required|numeric',
        ];
    }

    public function getSource(): string
    {
        return Arr::get($this->validated(), 'source');
    }

    public function getPage(): int
    {
        return (int) Arr::get($this->validated(), 'page');
    }

    /**
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_BAD_REQUEST)
        );
    }
}
