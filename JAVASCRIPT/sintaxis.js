// COMENTARIOS -> Deshabilitar lineas
/*
    Multi 
    Lineas
*/

// IMPRESIONES EN CONSOLA

console.log('Hello!');

// VARIABLES y CONSTANTES

let variable = "Andrea"; // Variable, se puede cambiar su valor, let significa que la variable puede ser modificada
var variablecita = "RS"; // Var, es una variable global, se puede cambiar su valor, pero no se recomienda su uso

const numero = 3.1416; // Constante, no se puede cambiar su valor
console.log(numero); // Imprime el valor de la constante

// CONCATENACIÓN -> SUMA DE ALGO A UN STRING

console.log("Hola " + variable);

console.log("5" + 5) // Imprime "55" porque concatena el string "5" con el número 5

// CAMBIAR LOS VALORES O VARIABLES

let cinco = parseInt("5"); // Convierte el string "5" a un número entero
console.log(cinco + 5); // Imprime 10 porque suma el número 5 con el número 5 convertido de string a entero

// OPERADORES MATEMÁTICOS

let suma = 5 + 5;
let resta = 10 - 5;
let division = 4 / 2;
let multiplicacion = 2 * 2;
let modulo = 10 % 5; // Módulo, el residuo de la división

// OPERADORES LÓGICOS
// AND -> &&, OR -> ||, NOT -> !



// OPERADORES DE COMPARACIÓN
// Igualdad -> ==, Desigualdad -> !=

let igualdad = "5" == 5; // true, porque compara el valor, no el tipo de dato
console.log(igualdad); // true

let igualdadEstricta = "5" === 5; // false, porque compara el valor y el tipo de dato
console.log(igualdadEstricta); // false

let desigual = "5" != 5; // true, porque compara el valor, no el tipo de dato
let desigualdadEstricta = "5" !== 5; // false, porque compara el valor y el tipo de dato

// OPERADORES DE COMPARACIÓN MATEMÁTICA
// >, <, >=, <=

let mayorQue = 5 > 3; // true, porque 5 es mayor que 3
let menorQue = 5 < 3; // false, porque 5 no es menor que 3
let mayorOIgualQue = 5 >= 3; // true, porque 5 es mayor o igual que 3
let menorOIgualQue = 5 <= 3; // false, porque 5 no es menor o igual que 3

// ESTRUCTURAS DE CONTROL O CONDICIONALES
// IF, ELSE, ELSE IF

if (false) {
    console.log("Esto funciona"); // Este bloque no se ejecutará porque la condición es falsa
} else if (true) {
    console.log("Acá no llega"); // Este bloque se ejecutará porque la condición es verdadera
}

switch (opcion) {
    case 1:
        console.log("Se comunicó con Admnistración");
        break;

    default:
    console.log("No es una opción que manejemos");
}

// TERNARIO

 condicion ? "caso true" : "caso false"; // Operador ternario, es una forma corta de escribir un if-else

// ESTRUCTURAS DE REPETICIÓN O BUCLES
// FOR, WHILE, DO WHILE

contador = 0;
while(contador < 5 && contador > 0) { // Se cumple solo una condición, en este caso contador < 5 por lo que no se ejecuta ya que la condición es falsa
    console.log(contador); // Imprime el valor del contador
    contador++; // Incrementa el contador en 1
}

contador = 0;
do{
    console.log(contador); // Imprime el valor del contador
    contador++; // Incrementa el contador en 1
}while(contador < 5 && contador > 0); // Se cumple solo una condición, en este caso contador < 5 por lo que se ejecuta al menos una vez

for(let i = 0; i < 5; i++){ // Bucle for, se ejecuta mientras i sea menor que 5
    console.log(i); // Imprime el valor de i

}

// FUNCIONES

function saludar(){ // Definición de una función llamada saludar
    console.log("Holiii"); // Imprime "Holiii"
}

// FUNCIONES ANÓNIMAS

const funcioncita = function(){ console.log("Soy anónima");} // Definición de una función anónima asignada a una variable
funcioncita(); // Llamada a la función anónima, imprime "Soy anonima"

// FAT ARROW FUNCTIONS (Funciones de flecha)

const funcionFlecha =() => { console.log("Soy anónima de flecha");} // Definición de una función de flecha asignada a una variable
funcionFlecha(); // Llamada a la función de flecha, imprime "Soy anónima"