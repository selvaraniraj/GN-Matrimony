<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
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
            'height' => 'required',
            'weight' => 'required',
            'about_you' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'height.required' => 'The Height field is required.',
            'weight.required' => 'The Weight field is required.',
            'about_you.required' => 'The About You field is required.',
        ];
    }
}
