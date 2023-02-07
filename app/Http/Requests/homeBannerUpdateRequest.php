<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class homeBannerUpdateRequest extends FormRequest
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
            'bio_description' => ['required', 'string'],
            'video_url' => ['required', 'url'],
            'banner_image' => [ 'image', 'mimes:' . $allowedExtensions],
        ];
    }
}
