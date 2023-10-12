<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
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
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ];
    }

    /** 
     * Asignamos los mensajes de error personalizados
     * 
     * @return array<string, string>
     *  
     */
    
    public function messages(){
        return [
            'email.required' => 'El correo electrónico no puede estar vacío.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.exists' => 'El correo electrónico no está registrado.',
            'password.required' => 'La contraseña no puede estar vacía.',
        ];
    }
}
