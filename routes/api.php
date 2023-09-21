<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ? Creamos los endpoints para la API de Categorías
Route::apiResource( '/categorias', CategoriaController::class );

// ? Creamos los endpoints para la API de Productos
Route::apiResource( '/productos', ProductoController::class );

// ? Creamos la API para el registro de usuarios
Route::post( 'register', [ AuthController::class, 'register' ]);
