<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUser extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'digits:1', 'min:0', 'max:1'],
            'role_id' => ['required','integer'],
            'year_of_birth' => ['required','integer','min:1900','max:'.date('Y')],
        ];
    }
}
