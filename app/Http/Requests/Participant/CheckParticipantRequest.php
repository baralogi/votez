<?php

namespace App\Http\Requests\Participant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckParticipantRequest extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  *
    //  * @return bool
    //  */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'identity_number' => [
                'required',
                Rule::exists('participants', 'identity_number')->where(function ($query) {
                    return $query->where('organization_id', 1);
                }),
            ],
            'organization_id' => ['required']
        ];
    }
}
