<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalFormRequest extends FormRequest
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
            'paternity' => 'required',
            'mother_status' => 'required',
            'no_brothers' => 'required',
            'no_sisters' => 'required',
            'parent_contact'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'paternity.required' => 'The Paternity field is required.',
            'mother_status.required' => 'The Mother Status field is required.',
            'no_brothers.required' => 'The No. of Brothers field is required.',
            'no_sisters.required' => 'The No. of Sisters field is required.',
            'parent_contact.required' => 'The Parents Contact No field is required.',
        ];
    }
}
