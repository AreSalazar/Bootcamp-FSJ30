// Diferencias entre JS y TS

/* JS
- Flexible 
- Fácil de aprender
- Fomra de programar sea a través de funciones
- El navegador web lo entiende (Intepretado)
*/


/* TS
- Tipado duro -> YA NO ES TAN FLEXIBLE
- POO -> Forma de programar -? Los 4 pilares están COMPLETOS
- Un poco más difícil de aprender
- El navegador web no lo entiende (Compilado) -> TRADUCIR EL CÓDIGO DE TS A JS POR MEDIO DE TSCOPILOT
- Node está preparado para correr TS pero no es del todo correcto
*/

//COMANDOS COMPILAR ARCHIVO: tsc main.ts -> node main.js 
// Declaración de variables
let numerito = 1; //JS

// Datos primitivos
let numero:number = 1; //TS
let nombre:string = "Kaz";
let activo:boolean = true;
let vacio:null = null; 

// Datos que vamos a rezar, intentar y prometer no usar
let nose:any ="Puedo ser cualquier cosa"; // Se evita porque para eso mejor usamos JS
let noDefinido:undefined = undefined; // Rompe la ejecución

console.log(numerito);
console.log(numero);

// Declaración de funciones
function saludar(nombreParam:string):string{
    return `Holiwis, ${nombreParam}`
}

console.log(saludar("Kaz Brekker"));


// Estructuras de datos
// ARRAY
let arraycito:number[] = [1,2,3];

// Vamos a guardar dentro de EL ARRAY, números o strings
let otroArray:number[]|string[] = [1,2,3];
otroArray = ["as"];

// Vamos a guardar dentro de EL ARRAY, números o strings
let arraycitoDobleDato: (number|string)[] = [123, "Suerte", 456]



// Tupla
let arrayEspecifico: [number,string] = [18, "Elisse"]; // Un array específico

// Podemos llegar a tener 2 tipos de datos
// VARIABLE: TIPO1|TIPO2
let dosTiposDatos:null|string = null;

dosTiposDatos = "";


// Tipo de dato personalizado

type Persona = {
    name:string,
    age: number
}

let programador: Persona = {name: "Andrea", age: 23};

let fsj30: Persona[] = [{name: "Andrea", age: 23}, {name: "Esmeralda", age: 23}] // Puedo hacer que Persona sea un array
