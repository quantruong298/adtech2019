<?php

namespace App\Http\Requests;

use App\Enums\Status;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $roles = Role::all()->pluck('id');

        return [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'digits:1', 'min:0', 'max:1'],
            'status_id'=> ['required',Rule::in([Status::NONE_ACTIVE,Status::ACTIVE,Status::BLOCKED])],
            'role'=> ['required',Rule::in($roles)],
            'year_of_birth' => ['required','integer','min:1900','max:'.date('Y')],
        ];
    }
}
