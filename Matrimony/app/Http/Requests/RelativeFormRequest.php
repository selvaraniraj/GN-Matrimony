<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelativeFormRequest extends FormRequest
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
          'first_relative_name' => 'required',
          'first_relative_relation' => 'required',
          'first_relative_bussiness' => 'required',
          'first_relative_number' => 'required',
          'first_relative_number' => 'required|digits:10',
        ];
    }
    public function messages()
    {
        return [
            'first_relative_name.required' => 'The  To Name field is required.',
            'first_relative_relation.required' => 'The Relation field is required.',
            'first_relative_bussiness.required' => 'The Bussiness field is required.',
            'first_relative_number.required' => 'The To Contact No field is required.', 
            'first_relative_number.digits' => 'The To Contact No must be exactly 10 digits.',
        ];
    }
}
