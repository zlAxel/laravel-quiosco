<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array {
        return [
            'name' => [ 'required', 'string', 'max:255' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users' ],
            'password' => [ 'required', 'string', 'confirmed', PasswordRules::min(8)->letters()->mixedCase()->numbers()->symbols() ],
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre no puede estar vacío.',
            'email.required' => 'El correo electrónico no puede estar vacío.',
            'password.required' => 'La contraseña no puede estar vacía.',
            'password.confirmed' => 'Las contraseñas escritas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
    }
}
