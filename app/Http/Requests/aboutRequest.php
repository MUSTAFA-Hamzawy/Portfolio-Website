<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class aboutRequest extends FormRequest
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
            $allowedExtensions = 'jpg,png,webp,jpeg,gif';
        return [
            'id' => [],
            'title' => ['required', 'string', 'max:150'],
            'about_description' => ['required', 'string', 'max:255'],
            'long_description' => ['required', 'string'],
            'sub_title' => ['required', 'string'],
            'about_image' => [ 'image', 'mimes:' . $allowedExtensions, 'max:4096']
        ];
    }
}
