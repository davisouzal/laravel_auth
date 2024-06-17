<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'cpf'=> ['required', 'string'],
            'phone'=> ['required', 'string'],
            'registration'=> ['required', 'string'],
            'idRole'=> ['required', 'string'],
        ];

        if ($this->isMethod('post')) {
            $rules['password'] = ['required', 'string'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um email válido.',
            'password.required' => 'O campo senha é obrigatório.',
            'cpf.required'=> 'O campo cpf é obrigatório.',
            'phone.required'=> 'O campo telefone é obrigatório.',
            'registration.required'=> 'O campo matrícula é obrigatório.',
            'idRole'=> 'O cargo é obrigatório.',
        ];
    }
}
