<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->method() == 'POST') {
            $rules['image'] = 'required|file|mimes:jpg,jpeg,png|max:5024';
            $rules['list_image'] = 'required|file|mimes:jpg,jpeg,png,mp4|max:15000';
        } else {
            $rules['image'] = 'nullable|file|mimes:jpg,jpeg,png|max:2024';
            $rules['list_image'] = 'nullable|file|mimes:jpg,jpeg,png,mp4|max:15000';
        }

        $rules['is_home'] = 'required|in:1,0';
        $rules['order'] = 'nullable|numeric|max:200000';

        $rules['ml'] = 'required|array';
        $rules['ml.en.name'] = 'required|string|max:255';
        $rules['ml.*.name'] = 'nullable|string|max:255';
        $rules['ml.*.text'] = 'nullable|string|max:30000';
        $rules['ml.*.short_description'] = 'nullable|string|max:255php artisan translations:import';

        return $rules;
    }
}
