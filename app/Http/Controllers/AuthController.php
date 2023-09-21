<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

use Illuminate\Http\Request;

class AuthController extends Controller {
    
    public function login( Request $request ) {
        # code...
    }
    
    public function logout( Request $request ) {
        # code...
    }
    
    public function register( RegisterRequest $request ) {
        
        $data = $request->validated();
        
    }

}
