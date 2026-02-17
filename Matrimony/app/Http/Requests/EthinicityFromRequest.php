<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EthinicityFromRequest extends FormRequest
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
            'religion' => 'required',
            'mothertongue'=>'required',
            'caste'=>'required',
            'language'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'religion.required' => 'The Religion field is required.',
            'mothertongue.required' => 'The Mothertongue field is required.',
            'caste.required' => 'The Caste field is required.',
            'language.required' => 'The Language field is required.',
        ];
    }
}
