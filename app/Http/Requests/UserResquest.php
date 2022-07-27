<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserResquest extends FormRequest
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
            'email' => ['email', 'string', 'required'],
            'cpf' => ['required', 'min:11', 'max:11', 'string'],
            'phone' => ['required', 'min:8', 'max:11', 'string'],
            'password' => ['required', 'min:8', 'string'],
            'confirmPassword' => ['required', 'min:8', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo Obrigatório',
            'name.min' => 'O campo precisa de no mínimo :min caracters',
            'name.string' => 'O campo precisa ser uma frase',
            'cpf.required' => 'Campo obrigatório',
            'cpf.min' => 'O campo preciso de no mínimo :min caracters',
            'cpf.max' => 'O campo preciso de no mínimo :max caracters',
            'cpf.string' => 'O campo precisa ser uma frase',
            'phone.required' => 'Campo obrigatório',
            'phone.min' => 'O campo preciso de no mínimo :min caracters',
            'phone.max' => 'O campo preciso de no mínimo :max caracters',
            'phone.string' => 'O campo precisa ser uma frase',
            'email.email' => 'Email inválido',
            'email.string' => 'O campo precisa ser uma frase',
            'email.required' => 'Campo Obrigatório',
            'password.required' => 'Campo Obrigatório',
            'password.min' => 'O campo preciso de no mínimo :min caracters',
            'password.string' => 'O campo precisa ser uma frase',
            'password.confirmed' => 'As senhas não são iguais',
            'confirmPassword.required' => 'Campo Obrigatório',
            'confirmPassword.min' => 'O campo preciso de no mínimo :min caracters',
            'confirmPassword.string' => 'O campo precisa ser uma frase',
            'confirmPassword.same' => 'As senhas não são iguais',
        ];
    }
}
