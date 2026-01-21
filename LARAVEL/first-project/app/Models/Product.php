<?php
//El modelo nos permite interactuar con la tabla products de la base de datos
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// Eloquent es el ORM(Object-Relational Mapping) de Laravel para interactuar con la base de datos

class Product extends Model
{
    //Si el fillable está vacío entonces el Product no sabe que tiene datos
    protected $fillable = [
        //El timestamps no se pone porque se rellena automaticamente
        'name',
        'description',
        'price'
    ];

    //Ejemplo de consulta query builder
    public static function getAllProducts(){
        return DB::table('products')->select('name','price','description')->get();
    }

    //Con query Builder: Antes se hacía con esta sintaxis vieja sin Eloquent
    /*
    public static function saveProduct($name,$description,$price){
        return DB::table('products')->insert([
            'name' =>$name,
            'description' => $description,
            'price' => $price
        ]);
    }*/
}
