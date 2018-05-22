<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class PricingPlanRequest extends FormRequest
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
                    'type' => 'required|string|unique:pricing_plans',
                    'price' => 'required|numeric',
                    'currency' => 'required|string',
                    'time' => 'required|string',
                    'properties' => 'required|string',

                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    //`name`, `img`, `job`, `Desc`, `user_id`
                    'type' => 'required|string|unique:pricing_plans,type,'.$request['id'],
                    'price' => 'required|numeric',
                    'currency' => 'required|string',
                    'time' => 'required|string',
                    'properties' => 'required|string',
                ];
            }
            default:break;
        }


    }
}
