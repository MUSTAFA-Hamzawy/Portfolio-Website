<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatePortfolioRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:150'],
            'category' => ['required', 'int'],
            'project_description' => ['required'],
//            'image' => ['image', 'mimes:' . $allowedExtensions, 'max:4096']
        ];
    }
}
