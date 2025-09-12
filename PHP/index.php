
<?php 
//Diferencias vs Javascript
// 1. PHP es un lenguaje compilado (se interpreta por apache)
// 2. PHP es un lenguaje de tipado debil pero con tipado obligatorio
// 3. PHP no es case sensitive (no distingue entre mayusculas y minusculas) en variables y funciones
// 4. PHP vamos a utilizar una POO con todos los pilares
// Delimitadores

/* Comentario
multilinea*/


// Salto de línea \n 
// La concatenacion va a ser con el punto .
echo "Holiwis con echo"."\n"; //El "+" se reserva solo para las matemáticas, en php se usa el . para separar
print "Holiwis con print \n"; // Puede usarse el \n dentro 
echo "Chauchis \n";

// Variable: un contenedor para almacenar información que puede cambiar en el tiempo
// let nombre = "Andrea" no lo agarra, let no sirve en php

$nombre = "Andrea"; //Se usan $ para variables

//CONSTANTES
define("PI", 3.1416); //define se usar en php versiones antiguas
const EULER = 2.7183; //const se usa para el php versión nuevo

// Template string
$templateString = "Hola, mi nombre es {$nombre}"; // Se usan {} para llamar a las variables
echo $templateString . "\n";

// Operadores matemáticos
$suma = 2 + 2;
$resta = 2 - 2;
$multiplicacion = 2 * 2;
$division = 5 / 2;
$modulo = 5 % 2;
$exponente = 2 ** 3; //2 ʌ 3

// Operadores de comparación
$igual = (2 == 2);
$igualdadEstricta = (2 === "2");
$diferente = (2 != 3);
$diferenteEstricta = (2 !== "2");
$mayor = (2 > 1);
$menor = (2 < 3);
$mayor_igual = (2 >= 2);
$menor_igual = (2 <= 3);

// Operadores lógicos AND (&&), OR (||), NOT (!)
$y = (2>3 && 3<=2);
$o = (3>5 || 2<5);
$no = !true;

// Funciones
// Funciones expresada--------------------------
function saludar($nombre){
    return "Hola, {$nombre}";
}
echo saludar ("Jose")."\n";
//----------------------------------------------

// Funciones anónimas---------------------------
$despedirse = function($nombre){
    return "Chauchis, {$nombre}";
};
echo $despedirse("Jose")."\n";
//----------------------------------------------

// Funciones flecha (PHP 7.4+)------------------
$gritar = fn($nombre) => "AHHHHHHHHHH, {$nombre}";
echo $gritar ("Andrea")."\n";
//----------------------------------------------

// Estructuras condicionales
// IF ELSEIF ELSE
$edad = 18;
if($edad < 18){
    echo "Eres menor de edad\n";
}elseif($edad === 18){
    echo "Tienes 18 años\n";
}else{
    echo "Eres mayor de edad \n";
}

// SWITCH case
$dia = 3;
switch($dia){
    case 1:
        echo "Lunes\n";
        break;
        case 2:
        echo "Martes\n";
        break;
        case 3:
        echo "Miércoles\n";
        break;
        default:
        echo "Es un otro día que no tenemos clases \n";
        break;
}

// Ternario
$mensaje = ($edad < 18) ? "Eres menor de edad" : "Eres mayor de edad";
echo $mensaje."\n";

// Estructuras repetitivas
// WHILE
$contador = 0;

while($contador <5){
    echo "Contador while: {$contador}\n";
    $contador++;
}

// DO WHILE
$contador = 0;
do{
    echo "Contador do while: {$contador}\n";
    $contador++;
}while($contador < 5);

// FOR
for($i = 0; $i <5; $i++){
    echo "Contador for: {$i}\n";
}


?>

