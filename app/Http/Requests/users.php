<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class users extends FormRequest
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
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                    'permissions' => 'required|numeric',
                    'img' => 'required|mimes:jpeg,jpg,png',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users,email,'.$request['id'],
                    'permissions' => 'required|numeric',
                    'img' => 'mimes:jpeg,jpg,png',
                ];
            }
            default:break;
        }

    }
}

