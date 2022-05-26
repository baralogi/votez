<?php

namespace App\Http\Requests\Candidate\Personal;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalRequest extends FormRequest
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
            'name' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'faculty' => 'required',
            'major' => 'required',
            'facultyText' => 'required',
            'majorText' => 'required',
            'semester' => 'required',
            'ipk' => 'required',
            'sskm' => 'required',
        ];
    }
}
