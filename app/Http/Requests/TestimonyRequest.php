<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonyRequest extends FormRequest
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
            //``title`, ``content, `name`, `user_id`

            'title' => 'required|string|max:50',
            'content' => 'required|string',
            'name' => 'required|string|max:50',

        ];
    }
}
