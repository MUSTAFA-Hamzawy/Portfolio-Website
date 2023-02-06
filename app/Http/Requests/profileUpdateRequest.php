<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class profileUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $allowedExtensions = 'jpeg,jpg,png,svg,webp';
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', Rule::unique(User::class)->ignore($this->user()->id)],
            'image' => ['image', 'mimes:'.  $allowedExtensions, 'max:4096']
        ];
    }
}
