<?php
// ARRAYS
// Se muestran 3 formas de crear un array:
// 1. Array indexado: se llaman así porque van en índice
$array = [1,2,3,4,5]; 
$array2 = array(); 
$array3 = new ArrayObject();

// Array asociativos
$arrayAsociativo = [
    "nombre" => "Andrea",
    "edad" => 30,
    "departamento" => "Sonsonate"
];

// En php se escribe print_r
print_r($arrayAsociativo);

// Imprimir solamente un valor, en este caso el nombre
print_r($arrayAsociativo["nombre"]);

// ARRAY PROPIEDADES Y MÉTODOS


// Saber el largo del array
print count($array)."\n";

// Agregar un elemento al final del array, en este caso el 6
array_push($array,6);
$array[] = 7; //Otra forma de imprimir sin usar print_r

// Agregar un elemento al inicio del array, en este caso el 0
array_unshift($array,0);
print_r($array);

// Eliminar el último elemento del array
array_pop($array);
print_r($array);

// Eliminar el primer elemento del array
array_shift($array);
print_r($array);

// Recorrer un array => Se utiliza FOREACH
foreach($array as $valor){
    echo "Valor: {$valor}\n";
}

// ARRAYS MULTIDIMENSIONALES
$arrayMultidimensional = [
    "nombre" => "Andrea",
    "edad" => 23,
    "hobbies" => ["Programar","Leer", "Correr","otros" => ["Jugar jueguitos" => ["LOL","DOTA2","CS2"]]]
];
print_r($arrayMultidimensional);


// CLASES Y OBJETOS

class Persona{
    //Atributos
    private $nombre;
    private $edad;

    //Constructor
    function __construct($nombreParam, $edadParam)
    {
        $this->nombre = $nombreParam;
        $this->edad = $edadParam;
    }

    // Métodos o funciones que están dentro de una clase
    public function getNombre(){
        return $this->nombre;
    }


}

// Crear un objeto
$personal = new Persona("Andrea", 23);


?>