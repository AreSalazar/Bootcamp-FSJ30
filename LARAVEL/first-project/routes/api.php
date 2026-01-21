<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; //Lo traemos para usar el controlador de productos

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//http://localhost:8000/api/$uri
//Cuando se trabaja con api.php se genera un grupo de rutas /api/$uri

//Primer forma de utilizar el controlador
//Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);

//Segunda forma de utilizar el controlador
Route::get('/products', [ProductController::class, 'index']);// /products es el $uri -> http://localhost:8000/api/products

//http://localhost:8000/api/products
Route::post('/products', [ProductController::class, 'store']);//Ruta para crear un producto

//http://localhost:8000/api/products/1
Route::put('/products/{id}', [ProductController::class, 'update']);//Ruta para actualizar un producto

//http://localhost:8000/api/products/1
Route::delete('/products/{id}', [ProductController::class, 'destroy']);//Ruta para eliminar un producto
