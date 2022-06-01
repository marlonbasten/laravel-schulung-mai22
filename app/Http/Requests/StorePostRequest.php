<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'content' => ['required', 'string'],
            'board_id' => ['required', 'exists:boards,id'],
            'categories' => ['nullable', 'array']
        ];
    }
}
