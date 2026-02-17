<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionalFormRequest extends FormRequest
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
           'education' => 'required',
            'collage_school' => 'required',
            'profession' => 'required',
            'company_name' => 'required',
            'destination' => 'required',
            'income' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'education.required' => 'The Education field is required.',
            'collage_school.required' => 'The Collage/School field is required.',
            'profession.required' => 'The Profession field is required.',
            'company_name.required' => 'The Company Name field is required.',
            'destination.required' => 'The Destination field is required.',
            'income.required' => 'The Income field is required.',
        ];
    }
}
