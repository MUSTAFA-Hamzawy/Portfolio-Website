<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class blogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'post_title' => ['required', 'string', 'max:150'],
            'image' => ['image', 'mimes:jpg,jpeg,png,webp,gif', 'max:4096'],
            'post_description' => ['required', 'string'],
            'category' => ['required', 'int']
        ];
    }
}
