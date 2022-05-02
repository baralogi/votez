<?php

namespace App\Http\Requests\Committee\CandidatePartner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SetSequenceNumberRequest extends FormRequest
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
            'sequence_number' => [
                'required', 
                'numeric', 
                Rule::unique('candidate_partners', 'sequence_number')->where('voting_id', $this->voting->id)->whereNot('id', $this->candidate_partner->id)
            ]
        ];
    }
}
