<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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

        switch ($this->method()) {
            case 'POST': {
                return [
                    //`name`, `img`, `job`, `Desc`, `user_id`
                    'name' => 'required|string|max:255|unique:services',
                    'logo' => 'required|string',
                    'Desc' => 'required|string',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    //`name`, `img`, `job`, `Desc`, `user_id`
                    'name' => 'required|string|max:255|unique:services,name,'.$this->id,
                    'logo' => 'required|string',
                    'Desc' => 'required|string',
                ];
            }
            default:break;
        }
    }
}
