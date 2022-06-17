<?php

namespace App\Http\Requests\Committee\Participant;

use Illuminate\Foundation\Http\FormRequest;

class StoreParticipantRequest extends FormRequest
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
            'identity_number' => ['required', 'string'],
            'name' => ['required', 'string', 'min:5', 'max:255']
        ];
    }
}
