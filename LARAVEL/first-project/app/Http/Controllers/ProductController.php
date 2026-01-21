<?php
//Los controllers sirven para manejar la logica de la aplicacion, no es tanto de manejar/generar consultas, para eso está el model

//¿Un controller inteactúa con la base de datos? No directamente, lo hace a traves de los modelos
//¿Un controller retorna vistas? Si, pero no siempre, puede retornar JSON u otros tipos de respuestas

//Este controller maneja los productos (usando el modelo Product)

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

 // Eloquent es el ORM(Object-Relational Mapping) de Laravel para interactuar con la base de datos

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //con query Builder
        //$products = Product::getAllProducts(); //Es la misma pero query Builder y no con Eloquent como el $products = Product::all();
        
        //con Eloquent
        $products = Product::all(); // Obtiene todos los productos de la tabla products, ::all() es un metodo estatico

        return response()->json([
            'data' => $products,
            'message' => 'Products retrieved succesfully',
            'status' => 200
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }//

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Con query Builder: Antes se hacía con esta sintaxis vieja sin Eloquent
        /*
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price; 
        $product->description = $request->description;

        $product->save();
        */


        //Eloquent -> create metodo estático para crear un nuevo registro en la tabla products
        $product = Product::create($request->all());//request->all() obtiene todos los datos enviados en la peticion

        return response()->json([//Estamos en una api, por eso retornamos JSON
            'data' => $product,
            'message' => 'Product created succesfully',
            'status' => 201 //201 significa created, si le dejamos 200 es un error porque el cliente espera un 201, esto es una api
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)//recomendable trabajar con el id
    {
        //Manejo de errores
        try{
            //Buscamos el producto por su id
            $product = Product::findOrFail($id);//find se usa para hacer validaciones más que todo y findOrFail como método en este caso

            //Actualizamos el producto en cuestión
            $product->update($request->all());//Se pone all para actualizar todos los datos, podés poner ->price y se actualizará solo el price aunque modifiques todos los datos

            //Agregarmos un mensaje de que se actualizó para mejor prática
            return response()->json([
                'data' => $product,
                'message' => 'Product updated succesfully',
                'status' => 200//Este 200 es para que salga en el frontend y que el usuario sepa el status
            ], 200); //200 indica en response que todo salió bien

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error updating product',
                'error' => $e->getMessage(),
                'status' => 500//500 Es un error interno del servidor, ese es el tipo de error quer quiero dar
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        try{
            //Buscamos el producto por su id para eliminar
            $product = Product::findOrFail($id);//find se usa para hacer validaciones más que todo y findOrFail como método en este caso

            $product->delete();

            //Agregamos un mensaje de que se eliminó para mejor prática
            return response()->json([
                'message' => 'Product deleted succesfully',
                'status' => 200//Este 200 es para que salga en el frontend y que el usuario sepa el status
            ], 200); //200 indica en response que todo salió bien


        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error deleting product',
                'error' => $e->getMessage(),
                'status' => 500//500 Es un error interno del servidor, ese es el tipo de error quer quiero dar
            ], 500);
        }
    }
}
