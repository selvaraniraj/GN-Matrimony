<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasicFormRequest extends FormRequest
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
             'name' => 'required',
             'created_by_relation' => 'required',
             'association_id'=>'required',
             'gender'=>'required',
             'dob'=>'required',
             'mobile'=>'required',
             'email'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'created_by_relation.required' => 'The Created by Relation field is required.',
            'association_id.required' => 'The Association field is required.',
            'gender.required' => 'The Gender field is required.',
            'dob.required' => 'The Date Of Birth field is required.',
            'mobile.required' => 'The Mobile field is required.',
            'email.required' => 'The Email field is required.',
        ];
    }
}
