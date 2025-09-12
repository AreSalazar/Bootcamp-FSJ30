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
var numerito = 1; //JS
// Datos primitivos
var numero = 1; //TS
var nombre = "Kaz";
var activo = true;
var vacio = null;
// Datos que vamos a rezar, intentar y prometer no usar
var nose = "Puedo ser cualquier cosa"; // Se evita porque para eso mejor usamos JS
var noDefinido = undefined; // Rompe la ejecución
console.log(numerito);
console.log(numero);
// Declaración de funciones
function saludar(nombreParam) {
    return "Holiwis, ".concat(nombreParam);
}
console.log(saludar("Kaz Brekker"));
// Estructuras de datos
// ARRAY
var arraycito = [1, 2, 3];
// Vamos a guardar dentro de EL ARRAY, números o strings
var otroArray = [1, 2, 3];
otroArray = ["as"];
// Vamos a guardar dentro de EL ARRAY, números o strings
var arraycitoDobleDato = [123, "Suerte", 456];
// Tupla
var arrayEspecifico = [18, "Elisse"]; // Un array específico
// Podemos llegar a tener 2 tipos de datos
// VARIABLE: TIPO1|TIPO2
var dosTiposDatos = null;
dosTiposDatos = "";
var programador = { name: "Andrea", age: 23 };
var fsj30 = [{ name: "Andrea", age: 23 }, { name: "Esmeralda", age: 23 }]; // Puedo hacer que Persona sea un array
