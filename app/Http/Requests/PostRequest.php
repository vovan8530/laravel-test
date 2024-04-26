<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'string',
            'is_published' => 'boolean',
            'likes' => 'int|min:1',
//            'category_id' => 'required|int|exists:categories,id',
            'category' => '',
            'tags' => 'array',
//            'tags.*' => 'int|exists:tags,id'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
