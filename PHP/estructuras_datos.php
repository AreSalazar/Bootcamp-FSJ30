<?php
// ARRAYS
// Se muestran 3 formas de crear un array:
// 1. Array indexado: se llaman así porque van en índice
$array = [1, 2, 3, 4, 5];
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
print count($array) . "\n";

// Agregar un elemento al final del array, en este caso el 6
array_push($array, 6);
$array[] = 7; //Otra forma de imprimir sin usar print_r

// Agregar un elemento al inicio del array, en este caso el 0
array_unshift($array, 0);
print_r($array);

// Eliminar el último elemento del array
array_pop($array);
print_r($array);

// Eliminar el primer elemento del array
array_shift($array);
print_r($array);

// Recorrer un array => Se utiliza FOREACH
foreach ($array as $valor) {
    echo "Valor: {$valor}\n";
}

// ARRAYS MULTIDIMENSIONALES
$arrayMultidimensional = [
    "nombre" => "Andrea",
    "edad" => 23,
    "hobbies" => ["Programar", "Leer", "Correr", "otros" => ["Jugar jueguitos" => ["LOL", "DOTA2", "CS2"]]]
];
print_r($arrayMultidimensional);


// CLASES Y OBJETOS

class Persona
{
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
    public function getNombre()
    {
        return $this->nombre;
    }
}

// Crear un objeto
$personal = new Persona("Andrea", 23);


//LIFO -> Stack -> Last In First Out

class Stack
{
    private $data;
}

$stacito = new Stack([1, 2, 3, 4]);


//FIFO -> Queue -> First In First Out
class Queue
{
    private $data;

    function __construct($dataParams = [])
    {
        $this->data = $dataParams;
    }

    //Agregar un elemento
    function add($element)
    {
        array_push($this->data, $element);
    }

    //Eliminar un elemento
    function remove()
    {
        return array_shift($this->data);
    }
}


//Lista enlazada -> Cada valor se guarda en un nodo, a diferencia del array, que se llama celda
class Node
{
    //Los nodos están separados, necesitan una flecha para pasar de un nodo a otro
    private $data; //Es el valor de cada nodo
    private $next; //Será la flechita que va de un valor a otro

    function __construct($valueParam)
    {
        $this->data = $valueParam;
        $this->next = null;
    }
}

//Ver grabacion 7:27 min para ver como generar los getters



//Esta será nuestra lista Enlazada
class LinkedList
{
    private $head; //El primer nodo de una lista enlazada se llama "HEAD"

    function __construct()
    {
        $this->head = null; //La mayoría de casos el head siempre empieza con null
    }

    //Método para que el valor haga algo
    function add($value)
    {
        //Creamos un nuevo nodo
        $newNode = new Node($value); //Se inicializa con $value porque al ser el primero debe de tener un valor
        //Ver grabacion para entender esta parte
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head; //Mira si el nodo está vacío y si es así agrega un nodo al final

            //Recorre la lista mientras el next no sea nulo, sirve para moverse de nodo en nodo
            //EL CURRENT VIAJA EN EL BUS HASTA QUE ENCUENTRE EL ASIENTO SOLO
            while ($current->getNext() !== null) {
                //Mientras que la flecha (getNext) sea diferente a null significa que hay un valor
                $current = $current->getNext();
            }
            //Cuando el nodo next sea null entonces el current indica que debe de guardar el nodo ahí y así queda como nodo final    
            //El current soy yo buscando el asiento vacío al final en el bus y me siento
            $current->setNext($newNode);
        }
    }
}

$listita = new LinkedList();
$listita->add(3);
$listita->add(1);
$listita->add(5);
print_r($listita);


//ÁRBOL
class Nodo
{
    private $value;
    private $left;
    private $right;

    function __construct($valueParam)
    {
        $this->value = $valueParam;
        $this->left = null;
        $this->right = null;
    }

    function getValue()
    {
        return $this->value; //Hacemos el get de $value ya que está en privado
    }

    function getRight()
    {
        return $this->right; //Hacemos el get de $right ya que está en privado
    }

    function getLeft()
    {
        return $this->left; //Hacemos el get de $left ya que está en privado
    }

    function setLeft($data)
    {
        $this->left = $data; //Hacemos el set de $left ya que está en privado
    }

    function setValue($data)
    {
        $this->value = $data; //Hacemos el set de $value ya que está en privado
    }

    function setRight($data)
    {
        $this->right = $data; //Hacemos el set de $right ya que está en privado
    }
}

//Se necesita las variables declaradas y el contructor en Nodo para empezar a trabajar con BinaryThree

class BinaryThree
{
    private $root;

    function __construct($data = null)
    {
        $this->root = $data;
    }

    function insert($data)
    {
        $newNode = new Nodo($data);
        //Preguntamos si root o raíz está vacío
        if ($this->root === null) {
            $this->root = $newNode;
            return $this->root;
        }

        $current = $this->root;

        while (true) {
            //Si el nuevo nodo es mayor que el current (que es la raíz)---------------
            if ($newNode->getValue() > $current->getValue()) {
                if ($current->getRight() === null) { //Si el lado derecho está vacío entonces:
                    $current->setRight = ($newNode); //Aquí decimos que el current (que es la raíz) en su lado derecho va a tener el nuevo nodo
                    return $newNode; //Aquí retornamos el nuevo nodo
                    //Sino está vacío es porque hay algo en la derecha
                } else {
                    $current = $current->getRight(); //Aquí el current se mueve a la derecha
                }
                //Si no es mayor, entonces es menor----------------
            } else {
                if ($current->getLeft() === null) { //Si el lado izquierdo está vacío entonces:
                    $current->setLeft($newNode); //Aquí decimos que el current (que es la raíz) en su lado izquierdo va a tener el nuevo nodo
                    return $newNode; //Aquí retornamos el nuevo nodo
                    //Sino está vacío es porque hay algo en la izquierda
                } else {
                    $current = $current->getLeft(); //Aquí el current se mueve a la izquierda
                }
            }
        }
    }

    //Función para encontrar un dato. Devolvería un mensaje si este dato existe
    function buscar($num)
    {
        $current = $this->root; //Empezamos desde la raíz
        while ($current !== null) { //Mientras current sea diferente a null
            if ($num === $current->getValue()) { //Si el número es igual al valor del current
                return "El número {$num} sí existe en el árbol"; //Retornamos el mensaje
            }
            //Si el número es mayor que el current
            if ($num > $current->getValue()) {
                $current = $current->getRight(); //Moverse a la derecha
            //Si el número es menor que el current
            } else {
                $current = $current->getLeft(); //Moverse a la izquierda
            }
        }
    }
    //Función para eliminar un nodo
    
}

$nuevoNodo = new Nodo(10); //Crear un nuevo nodo para pasarlo com o data a arbolito

$arbolito = new BinaryThree($nuevoNodo); //Aquí lo pasamos como data
print_r($arbolito);

echo "\n";

$arbolito->insert(17); //Nuevo nodo que quiero insertar al árbol
$arbolito->insert(19); //Nuevo nodo que quiero insertar al árbol
$arbolito->insert(13); //Nuevo nodo que quiero insertar al árbol
print_r($arbolito);
