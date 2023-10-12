<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    
    public function login( LoginRequest $request ) {

        // ? Validamos los datos del formulario
        $data = $request->validated();

        // ? Validamos las credenciales del usuario
        if ( ! auth()->attempt( $data ) ) {
            return response()->json( [
                'errors' => ['Credenciales incorrectas'],
            ], 422 );
        }else{
            // ? Creamos el token
            $token = auth()->user()->createToken('token')->plainTextToken;

            // ? Retornamos la respuesta
            return response()->json( [
                'access_token' => $token, // * Token de acceso
                'token_type' => 'Bearer', // * Tipo de token | Bearer : Se usa para autenticación HTTP con el esquema de autenticación de portador descrito en el RFC 6750
                'user' => auth()->user(), // * Usuario registrado
            ] );
        }
    }
    
    public function logout( Request $request ) {
        // ? Eliminamos el token de acceso
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json( [
            'user' => null,
        ]);
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
