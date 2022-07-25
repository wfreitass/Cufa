<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleRequest extends FormRequest
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
        return [
            'name' => ['required', 'min:8', 'string'],
            'cpf' => ['required', 'min:11', 'max:11', 'string'],
            'phone' => ['required', 'min:8', 'max:11', 'string'],
            'address' => ['required', 'string'],
            'complement' => ['string']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo Obrigatório',
            'name.min' => 'O campo precisa de no mínimo :min caracters',
            'name.string' => 'O campo precisa ser uma frase',
            'cpf.required' => 'Campo obrigatório',
            'cpf.min' => 'O campo precisa de no mínimo :min caracters',
            'cpf.max' => 'O campo precisa de no mínimo :max caracters',
            'cpf.string' => 'O campo precisa ser uma frase',
            'phone.required' => 'Campo obrigatório',
            'phone.min' => 'O campo precisa de no mínimo :min caracters',
            'phone.max' => 'O campo precisa de no mínimo :max caracters',
            'phone.string' => 'O campo precisa ser uma frase',
            'address.required' => 'Campo Obrigatório',
            'address.string' => 'O campo precisa ser uma frase',
            'complement.string' => 'O campo precisa ser uma frase'
        ];
    }
}
