<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator): void
    {
        session()->flash('error6', $validator->getMessageBag());
        parent::failedValidation($validator);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'age' => ['integer'],
            'salary' => ['required', 'decimal:2'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['string', 'max:50']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
