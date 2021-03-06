<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteAgenteRequest extends FormRequest
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

        switch($this->method()) {
            case 'GET':
                return [];

            case 'POST':
                return [];

            case 'PUT':
                return [
                    'email' => 'required'
                ];

            case 'DELETE':
                return [];

            default:
                return [];
        }

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'email.email' => "Digite corretamente"
        ];
    }


}
