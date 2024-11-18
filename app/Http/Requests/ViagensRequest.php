<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViagensRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'renavam' => 'required|string|exists:veiculos,renavam',  // Garantir que renavam exista na tabela veiculos
            'KmInicial' => 'required|numeric|min:0',                  // Verificar se KmInicial é numérico e maior que 0
            'KmFinal' => 'required|numeric|min:0|gt:KmInicial',       // Verificar se KmFinal é maior que KmInicial
        ];
    }
}
