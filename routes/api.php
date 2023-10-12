<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;

use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group( function () {
    // ? Creamos la API para obtener los datos del usuario autenticado
    Route::get('/user', function (Request $request){
        return $request->user();
    });
    Route::post( '/logout', [ AuthController::class, 'logout' ]); // * Creamos la API para el cierre de sesión de usuarios
    
    // ? Creamos la API para los pedidos
    Route::apiResource( '/pedidos', PedidoController::class );
});

// ? Creamos los endpoints para la API de Categorías
Route::apiResource( '/categorias', CategoriaController::class );

// ? Creamos los endpoints para la API de Productos
Route::apiResource( '/productos', ProductoController::class );

// ? Creamos la API para el registro de usuarios
Route::post( 'register', [ AuthController::class, 'register' ]);

// ? Creamos la API para el inicio de sesión de usuarios
Route::post( 'login', [ AuthController::class, 'login' ]);
