<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupportRequest extends FormRequest
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
        $rules =  [
            'subject' => '|required|min:3|max:255|unique:supports',
            'body' => [
                'required',
                'min:3',
                'max:100000',
            ],
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $id = $this->support ?? $this->id;
            $rules['subject'] = [
                'required', //nullable
                'min:3',
                'max:255',
                Rule::unique('supports')->ignore($id),
            ];
            //OUTRA FORMA DE RESOLVER O PROBLEMA
            /*$rules['subject'] = [
                'required|min:3|max:255|unique:supports,subject,{$this->id},id',

                ///ele é unico na tabela supports, mas adicionei uma exceção pra quando o id que estou enviando para update seja igual ao valor da coluna id já no banco
            ]*/
        }

        return $rules;
    }
}
