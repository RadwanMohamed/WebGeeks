<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoriesRequest extends FormRequest
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
    public function rules(Request $request)
    {

        switch ($this->method()) {
            case 'POST': {
                return [
                    'name' => 'required|string|unique:categories',
                    'img' => 'required|mimes:jpeg,jpg,png',

                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [

                    'name' => 'required|string|unique:categories,name,'.$request['id'],
                    'img' => 'mimes:jpeg,jpg,png',
                ];
            }
            default:break;
        }


    }
}
