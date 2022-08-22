<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff|max:4096',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'is_home' => 'required|in:0,1',

            'ml' => 'required|array',
            "ml.*.name" => 'nullable|string|max:255',
            'ml.*.text' => 'nullable|string|max:2000',
        ];
    }
}
