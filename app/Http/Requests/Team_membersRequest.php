<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Team_membersRequest extends FormRequest
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
            //`name`, `img`, `job`, `Desc`, `user_id`
            'name' => 'required|string|max:255',
            'job' => 'required|string',
            'Desc' => 'required|string',
            'img' => 'required|mimes:jpeg,jpg,png',
        ];
    }
}
