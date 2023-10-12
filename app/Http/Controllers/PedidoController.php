<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProducto;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PedidoController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return [
            'pedidos' => Pedido::where('user_id', auth()->id())->get()
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        // ? Creamos la orden en la base de datos
        $pedido = Pedido::create([
            'user_id' => auth()->id(),
            'total' => $request->total,
        ]);

        // ? Obtenemos el ID de la orden creada
        $id = $pedido->id;

        // ? Obtenemos los productos del carrito de compras
        $productos = $request->productos;

        // ? Formateamos un array con los productos y la orden
        $pedido_producto = [];

        foreach ( $productos as $producto ) {
            $pedido_producto[] = [
                'pedido_id' => $id,
                'producto_id' => $producto['id'],
                'cantidad' => $producto['cantidad'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // ? Creamos los productos de la orden en la base de datos
        PedidoProducto::insert( $pedido_producto );

        // ? Retornamos la respuesta
        return [
            'message' => 'Pedido creado correctamente',
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido){
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido){
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido){
        //
    }
}
