<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditRouteRequest extends FormRequest
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
            'name' => ['required','string','max:50', Rule::unique('routes')->ignore($id)],
            'path' => ['required','string','max:50', Rule::unique('routes')->ignore($id)]
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'The route is required.',
            'name.unique' => 'The route has already been taken.',
            'name.max' => 'The route must not exceed 100 characters.',
            'path.required' => 'The path is required.',
            'path.unique' => 'The path has already been taken.',
            'path.max' => 'The path must not exceed 100 characters.',
        ];
    }
}
