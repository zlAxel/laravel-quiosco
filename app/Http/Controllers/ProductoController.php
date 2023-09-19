<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoCollection;

use App\Models\Producto;

use Illuminate\Http\Request;

class ProductoController extends Controller {
    /**
     * Muestra una lista de los recursos.
     */
    public function index() {
        // return new ProductoCollection( Producto::where('available', true)->orderBy('id', 'DESC')->paginate( 10 ) );
        return new ProductoCollection( Producto::where('available', true)->orderBy('id', 'DESC')->get() );
    }

    /**
     * Almacena un nuevo recurso en el almacenamiento.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(Producto $producto) {
        //
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, Producto $producto) {
        //
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Producto $producto) {
        //
    }
}
