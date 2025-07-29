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
function saludar(nombreParam) {
    return "Holiwis, ".concat(nombreParam);
}
console.log(saludar("Kaz Brekker"));
