<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Http\Requests\AbstractRequest;

class UserCreateRequest extends AbstractRequest
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
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'document' => ['nullable', 'string', 'min:11', 'max:14', 'unique:users,document', 'required_without:email'],
            'email' => ['nullable', 'email', 'unique:users,email', 'required_without:document'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'O campo primeiro nome é obrigatório',
            'first_name.string' => 'O campo primeiro nome deve ser uma string',

            'last_name.required' => 'O campo último nome é obrigatório',
            'last_name.string' => 'O campo último nome deve ser uma string',

            'document.string' => 'O campo documento deve ser uma string',
            'document.min' => 'O campo documento deve ter no mínimo 11 caracteres',
            'document.max' => 'O campo documento deve ter no máximo 14 caracteres',
            'document.unique' => 'Este documento já está cadastrado',
            'document.required_without' => 'O campo documento é obrigatório se o campo email estiver vazio',

            'email.email' => 'O campo email deve ser um email válido',
            'email.unique' => 'Este email já está cadastrado',
            'email.required_without' => 'O campo email é obrigatório se o campo documento estiver vazio',

            'password.required' => 'O campo senha é obrigatório',
            'password.string' => 'O campo senha deve ser uma string',
            'password.min' => 'O campo senha deve ter no mínimo 8 caracteres',
        ];
    }
}