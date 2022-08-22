<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'is_home' => 'required|in:0,1',
            'order' => 'nullable|numeric|max:200000',

            'ml' => 'required|array',
            "ml.*.name" => 'nullable|string|max:255',
            'ml.*.text' => 'nullable|string|max:2000',
            'ml.*.file' => 'nullable|nullable|mimes:pdf,doc,docx,ppt,pptx|max:8192',
        ];
    }
}
