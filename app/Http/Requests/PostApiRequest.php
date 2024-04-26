<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostApiRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'string',
            'is_published' => 'boolean',
            'likes' => 'int|min:1',
            'category.id' => 'exists:categories,id|nullable',
            'category.title' => 'string|nullable',
            'tags' => 'array',
            'tags.*.id' => 'exists:categories,id|nullable',
            'tags.*.title' => 'string|nullable',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
