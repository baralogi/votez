<?php

namespace App\Http\Requests\Committee\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'roles' => ['required', Rule::exists('roles', 'name')->where('guard_name', 'web')],
        ];
    }
}
