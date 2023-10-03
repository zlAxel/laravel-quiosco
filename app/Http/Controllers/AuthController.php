<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    
    public function login( Request $request ) {
        # code...
    }
    
    public function logout( Request $request ) {
        # code...
    }
    
    public function register( RegisterRequest $request ) {
        
        // ? Validamos los datos del formulario
        $data = $request->validated();

        // ? Creamos el usuario
        $user = User::create( [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make( $data['password'] ),
        ] );

        // ? Creamos el token
        $token = $user->createToken( 'token' )->plainTextToken;

        // ? Retornamos la respuesta
        return response()->json( [
            'access_token' => $token, // * Token de acceso
            'token_type' => 'Bearer', // * Tipo de token | Bearer : Se usa para autenticación HTTP con el esquema de autenticación de portador descrito en el RFC 6750
            'user' => $user, // * Usuario registrado
        ] );
        
    }

}
