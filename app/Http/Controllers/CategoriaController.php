<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller {
    /* 
    * @return \Illuminate\Http\Response
    */
    public function index() {
        return response()->json([ 'categorias' => Categoria::all() ]);
    }
}
