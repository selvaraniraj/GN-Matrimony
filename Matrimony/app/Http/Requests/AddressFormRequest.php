<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressFormRequest extends FormRequest
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
            'state' => 'required',
            'city' => 'required',
            'taluk' => 'required',
                   ];
    }
    public function messages()
    {
        return [
            'city.required' => 'The City field is required.',
            'state.required' => 'The State field is required.',
            'taluk.required' => 'The Taluk field is required.',
           
        ];
    }
}
