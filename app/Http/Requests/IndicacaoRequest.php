<?php

namespace App\Http\Requests;

use App\Models\Indicacao;
use Illuminate\Foundation\Http\FormRequest;

class IndicacaoRequest extends FormRequest
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
                return [
                    'status' => "nullable|in:" . implode(',', Indicacao::$tipoStauts)
                ];

            case 'POST':
                return [
                    'nome' => 'required',
                    'email' => 'nullable|email',
                    'telefone' => 'nullable',
                    'tipos_seguros_id' => 'required|exists:tipos_seguros,id',
                    'clientes_agentes_id' => 'required|exists:clientes_agentes,id'
                ];

            case 'PUT':
                return [
                    'nome' => 'min:4',
                    'email' => 'nullable|email',
                    'telefone' => 'nullable',
                    'tipos_seguros_id' => 'exists:tipos_seguros,id',
                    'status' => "nullable|in:" . implode(',', Indicacao::$tipoStauts)
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
            'email.email' => "Digite corretamente",
            'tipos_seguros_id.exists' => 'Tipo de Seguro inexistente',
            'clientes_agentes_id.exists' => 'Cliente Agente inexistente',
            'status.in' => "Status incorreto, permitido somente: ". implode(', ',Indicacao::$tipoStauts)
        ];
    }


}
