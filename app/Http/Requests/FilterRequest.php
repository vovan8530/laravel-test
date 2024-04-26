<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'category_id' => 'int|exists:categories,id',
            'page' => 'int|nullable',
            'per_page' => 'int|nullable',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
