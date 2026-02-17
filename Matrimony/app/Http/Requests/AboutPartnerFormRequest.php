<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutPartnerFormRequest extends FormRequest
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
            'age' => 'required',
            'age_from' => 'required',
            'height_id' => 'required',
            'height_id_from' => 'required',
            'religion' => 'required',
            'mother_tongue' => 'required',
            'rassi' => 'required',
            'star' => 'required',
            'education' => 'required',
            'about_you'=>'required',
        ];
    }
    public function messages()
    {        return [
            'age.required' => 'The  To Age field is required.',
            'age_from.required' => 'The From Age field is required.',
            'height_id.required' => 'The From Height is required.',
            'height_id_from.required' => 'The To Height field is required.',
            'religion.required' => 'The To Religion field is required.',
            'mother_tongue.required' => 'The Mothertongue field is required.',
            'raasi.required' => 'The Raasi field is required.',
            'star.required' => 'The Star field is required.',
            'education.required' => 'The Educational Qualification field is required.',
            'about_you.required' => 'The About Partner field is required.',
        ];
    }
}
