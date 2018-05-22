<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
class SkillsRequest extends FormRequest
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
                    'name' => 'required|string|max:255|unique:skills',
                    'value' => 'required|numeric',
                ];
            }
            case 'PUT':
            case 'PATCH': {
            return [
                //`name`, `img`, `job`, `Desc`, `user_id`
                'name' => 'required|string|max:255|unique:skills,name,'.$this->id,
                'value' => 'required|numeric',
            ];
            }
            default:break;
        }

    }
}
