<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'O campo name é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O email deve ser um email válido',
            'password.required' => 'O campo senha é obrigatório'
        ];
    }
}
