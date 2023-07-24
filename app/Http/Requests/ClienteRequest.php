<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                'nome' => 'required|min:3|max:255',
                'email'=> 'email',
                'CNPJ'=>'cnpj', 
                'cel'=>'telefone_com_ddd'
        ];
    }
}
