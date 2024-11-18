<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotoristaRequest extends FormRequest
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
            'nome' => ['required','string','max:255'],
            'data_nascimento' => ['required','date','before:today'],
            'cnh' => ['required','string','unique:motoristas,cnh'],
        ];
    }
}
