<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class AuthenticateRequest
 *
 * Request validation use specified rules
 *
 * @package App\Http\Requests
 */
class AuthenticateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'access_token' => ['required', 'string'],
            'id' => ['required', 'integer'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'sig' => ['required', 'string'],
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
