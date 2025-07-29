//Estructuras de datos en JavaScript

//Datos primitivos -> string, interger, float, double, boolean, null
//UNDEFINED -> VACIO PARA EL SISTEMA

let vacio;
console.log(vacio); // undefined, porque la variable no ha sido inicializada

vacio = "string re estandar";
console.log(vacio); // "string re estandar", ahora la variable tiene un valor

//Objetos
//Objetos literales
//Los OBJETOS LITERALES se pueden usar como por ejemplo en un Formulario con datos de usuario

let perro = {
    //clave : valor
    nombre: "Firulais",
    edad: 4
}

//Mostrar una característica del perro (objeto)
console.log(perro.nombre); // "Firulais", accede a la propiedad nombre del objeto perro


//-----------------------------------------------------------------------------------------------------------------------------//
//POO (Programación Orientada a Objetos)
//Forma de escribir el código -> Reutilizable

//Clases y Objetos
//Clase -> Molde
//Objeto -> Instancia de la clase *Creamos algo en base a

class Persona {
    //Características de esa clase -> Atributos/Propiedades
    //Constructor -> MÉTODO PARA CREAR OBJETOS a través de este molde
    constructor(nombreParam, edadParam) { //nombreParam es un parámetro que se puede pasar al constructor
        //this -> APUNTA A ESTA CLASE (Hace referencia al objeto que se está creando)
        this.nombre = nombreParam;
        this.edad = edadParam;
    }

    //Métodos -> Funciones, cosas que hace esta clase
    correr() {
        console.log("Estoy corriendo");
        return "Estoy corriendo"; // Retorna un mensaje indicando que la persona está corriendo
    }
}

//------------CONSTRUCTOR-----------------//
//Utiizar el constructor de Persona para crear un objeto -> INSTANCIAR OBJETOS
let personita = new Persona("Andrea", 23);
let personita2 = new Persona("Esmeralda", 25);

//Mostrar en pantalla las propiedades de los objetos creados
console.log(personita); // Muestra el objeto personita con sus propiedades
console.log(personita2); // Muestra el objeto personita2 con sus propiedades

//---------------MÉTODOS-----------------//
//Acceder a algo de un objeto
personita.correr(); // Llama al método correr del objeto personita, imprime "Estoy corriendo"


//--------------------------------------------------------------------------------------------------//
//PILARES DE POO -> OOP
//Existen para asegurarnos un código más escalables, flexibles y seguro

//PILARES QUE SÍ SE PUEDEN UTILIZAR EN JAVASCRIPT
//1. Herencia -> Una clase hija de otra, copia el comportamiento del padre (Permite que una clase herede propiedades y métodos de otra clase)
//2. Polimorfismo -> Cambiar el comportamiento de un método del padre, con respecto a su hijo (Permite que una clase tenga múltiples formas, es decir, que un método pueda tener diferentes implementaciones)



class Programador extends Persona { // La clase Programador hereda de la clase Persona, Programador es el hijo de Persona

    //----------------------------------------HERENCIA----------------------------------------//
    constructor(nombreParam, edadParam, lenguajesParam) { // Parámetros del constructor de Programador

        super(nombreParam, edadParam); // super() -> Llamar al constructor de la clase padre (Persona) para seguir usando sus características

        //Características propias de Programador
        this.lenguajesParam = lenguajesParam; // Propiedad específica de Programador

    }

    //Método propio de programador
    codear() {
        console.log("Estoy codeando");
    }

    //--------------------------------------POLIMORFISMO--------------------------------------//
    correr() {
        //super.correr(); // Llama al método correr de la clase padre (Persona)
        console.log("No corro tan rápido, pero puedo trotar"); // Cambia el comportamiento del método correr en la clase Programador
    }
}

let miniProgramador = new Programador("Evie", 27, "Javascript"); // Creamos un objeto de la clase Programador, que hereda las propiedades y métodos de Persona
console.log(miniProgramador); // Muestra en pantalla el objeto miniProgramador con sus propiedades

miniProgramador.nombre = "Elisse"; // Cambia el nombre del programador (Polimorfismo)
console.log(miniProgramador); // Muestra en pantalla el objeto miniProgramador con el nombre actualizado
miniProgramador.correr(); // Llama al método correr del objeto miniProgramador, que ha sido modificado por el polimorfismo




////PILARES QUE NO SE PUEDEN UTILIZAR EN JAVASCRIPT
//3. Encapsulamiento -> Limitar el acceso a la información de una clase -> Modificadores de accesos (Ocultar la información de una clase, para que no se pueda acceder directamente a sus propiedades)
//4. Abstracción -> Ocultar la complejidad de una clase, para que solo se muestren los aspectos relevantes (Permite simplificar el uso de una clase, mostrando solo lo necesario para su funcionamiento)

// ARRAYS -> Estructura de datos que permite almacenar múltiples valores en una sola variable
let arraycitoIdx = [18, 19, 25, 33]; // Array indexado -> Ordena en índice 0 en adelante
console.log(arraycitoIdx[0]); // 18, accede al primer elemento del array


let arrayAsociativo = {// Array asociativo -> Clave-valor, similar a un objeto
    nombre: "Andy"
}
// Sintaxis para imprimir un objeto, se puede con [''] y se puede arrayAsociativo.nombre
console.log(arrayAsociativo['nombre']); // "Andy", accede al valor de la clave 'nombre' del objeto arrayAsociativo


// Array multidimensional
// Creamos un array con varias dimensiones (Array dentro de array)
let arraycitoMulti = [[1, 2], [{ nombre: "Edward" }]];
console.log(arraycitoMulti); // Imprime todas las cajas

// Accedemos a la posición 0 -> ES LA PRIMERA DEL ARRAY
let cajaDeIndiceCero = arraycitoMulti[0];
console.log(cajaDeIndiceCero[1]); // Imprime el valor 2 de la caja 0

// Accedemos a la posición 1
let cajaDeIndiceUno = arraycitoMulti[1];
console.log(cajaDeIndiceUno[0]); //Imprime el valor nombre de la caja 1

// Diferentes sintaxis de console log para mostrar el nombre
console.log(cajaDeIndiceUno[0].nombre);
console.log(arraycitoMulti[1][0].nombre);


// Métodos para arrays necesarios de conocer para el Frontend
// Recorrer arrays

let nombres = ["Tared", "Jean", "Hoffman", "Trystan"];

// FOREACH -> Recorre el array y nos deja utilizar, la posición y el índice del array
nombres.forEach((value, index) => {
    console.log(index);
    console.log(value);
})

// Dar vuelta al array

let nombresReverse = nombres.reverse();

// Dar vuelta al array
nombresReverse.forEach((value, index) => {
    console.log(index);
    console.log(value);
})


// Métodos Útiles ----------------------------------------------------------------------------------------------------------
//Map -> Recorre el array y nos retorna algo por cada posición -> transformar valores

let nombres2 = ["Kaz", "Inej", "Nina", "Jesper"];
const nombresMayus = nombres2.map((value) => {
    return value.toUpperCase();
});
console.log(nombresMayus); //Imprimir


let numeritos = [1, 3, 5, 7]; // map se usa solo en array
let numeritosPorDos = numeritos.map((value) => { /*map se espera que haga algo, alguna acción del objeto, en este caso que multiplique por 2 */
    return value * 2;
})
console.log(numeritosPorDos); //Imprimir


// Filtrar la información
// Primer método: Filter -> Filtramos la info y la retornamos en base a una condición
const usuarios = [{ //const o let es para lo mismo
    nombre: "Nina",
    edad: 18
},
{
    nombre: "Mathias",
    edad: 19
},
{
    nombre: "Wylan",
    edad: 16
}]
// array.filter((apodoValorDeCadaPosicion) => { return CONDICION A CUMPLIR})
const mayoresDe17 = usuarios.filter((value) => { return value.edad > 17 }) //Sin return no funciona, incluso puedes poner otro nombre al value y siempre servirá
console.log(mayoresDe17);


//Segundo método: Find => Buscamos y retornamos UN solo Dato
const usuarioNina = usuarios.find( usuario => usuario.nombre === "Nina");
console.log(usuarioNina);



// Foreach que reciba el array completo, porque Foreach no lee todo el array, solo lee el primer valor (0)
let arraryNum = [1, 2, 3, 4, 6];

arraryNum.forEach((value, index, array) => {
    arraryNum.pop();
    console.log(array);
})


// Métodos OBLIGATORIOS -------------------------------------------------------------------------------------------------------------------
let array = [0];
// Agregar datos al array

// AL FINAL
array.push(2); // Agrega datos pero en la última posición
// AL INICIO
array.unshift(1); // Agrega datos pero en la primera posición

// Eliminar datos del array

// AL FINAL
array.pop();
// AL INICIO
array.shift();

console.log(array);

 
// Obtener el largo de un array
let largor = array.length;
console.log(largor);

// Strings
// La propiedad lenght sirve también para strings
console.log("Holiwis".length);

// Método para eliminar los espacios al principio y al final, NO intermedios
let sinEspacios = "HoliwisJude ".trim(); // trim elimina el espacio extra del final
console.log(sinEspacios);
console.log(sinEspacios.length);