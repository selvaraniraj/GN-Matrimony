<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoroscopeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'raasi' => 'required',
            'star'=>'required',
            'birth_place'=>'required',
            'horoscope_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'old_horoscope_image' => 'nullable', 
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->hasFile('horoscope_image') && empty($this->input('old_horoscope_image'))) {
                $validator->errors()->add('horoscope_image', 'The Horoscope Photo field is required.');
            }
        });
    }

    public function messages()
    {
        return [
            'raasi.required' => 'The Rassi field is required.',
            'star.required' => 'The Star field is required.',
            'birth_place.required' => 'The Birth Place field is required.',
            'horoscope_image.image' => 'The Horoscope Photo must be an image file.',
            'horoscope_image.mimes' => 'The Horoscope Photo allows only jpeg, png, jpg, gif.',
            'horoscope_image.required' => 'The Horoscope Photo field is required.',
        ];
    }
}
