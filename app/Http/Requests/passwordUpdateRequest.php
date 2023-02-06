<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class passwordUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'old-password' => ['required'],
            'new-password' => ['required', 'min:8'],
            'confirm-password' => ['required', 'same:new-password']
        ];
    }
}
