<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contactRequest extends FormRequest
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
            'sender_name' => ['required', 'string', 'max:100'],
            'sender_email' => ['required', 'email', 'max:150'],
            'subject' => ['required', 'string', 'max:150'],
            'address' => ['string'],
            'message' => ['required', 'string']
        ];
    }
}
