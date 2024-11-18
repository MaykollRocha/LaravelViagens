<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculosRequest extends FormRequest
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
            'modelo' => ['required','string','max:255'],
            'ano' => ['required','integer',' min:1900',' max:' . date('Y')],
            'data_aquisicao' => ['required','date'],
            'kms_rodados_aquisicao' => ['required','integer','min:0'],
            'renavam' => ['required','string','unique:veiculos,renavam'],
        ];
    }
}
