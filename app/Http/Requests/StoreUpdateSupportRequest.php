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
        $id = $this->support ?? $this->id;
        $rules =  [
            'subject' => [
                'required', //nullable
                'min:3',
                'max:255',
                Rule::unique('supports')->ignore($id),
            ],
            'body' => [
                'required',
                'min:3',
                'max:1000',
            ],
        ];

        return $rules;
    }
}
