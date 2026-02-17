<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('id');
        return [
            'value' => ['required','string','max:50']
        ];
    }
    public function messages()
    {
        return[
            'value.required' => 'The value is required.',
            'value.max' => 'The value must not exceed 50 characters.',
        ];
    }
}
