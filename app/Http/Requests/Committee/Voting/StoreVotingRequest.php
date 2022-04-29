<?php

namespace App\Http\Requests\Committee\Voting;

use Illuminate\Foundation\Http\FormRequest;

class StoreVotingRequest extends FormRequest
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
            'logo' => 'required|mimes:jpeg,jpg,png|max:2000',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_at' => 'required|date|after:today',
            'end_at' => 'required|date|after:start_at',
        ];
    }
}
