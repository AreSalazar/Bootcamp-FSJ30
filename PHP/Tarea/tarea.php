<?php
/*Para esta actividad tendrán que realizar 4 ejercicios de lógica en PHP.*/

/*1. Problema de Lista Invertida:
Escribe un programa que tome un array de números y devuelva una nueva lista que contenga los mismos elementos en orden inverso.
Sin UTILIZAR array_reverse()*/

//Al nombrar las funciones, procurar que sean verbos
function invertirLista($array)
{
    //Un array que recorre de atrás para adelante, es una forma de hacer lista invertida
    for ($i = count($array); $i >= 0; $i--) {
        $arraycitoNuevo[] = $array[$i];
    }
    return $arraycitoNuevo;
}


/*2. Problema de Suma de Números Pares:
Crea un script que sume todos los números pares en un array de números enteros.*/

function sumarParesArray($array)
{
    $total = 0;

    foreach ($array as $numero) {
        //Si tenemos números PARES
        if ($numero % 2 === 0) { //Si número es exactamente 0 es true
            $total += $numero; //$total = $total + $numero;
        }
    }

    return $total;
}


/*3. Problema de Frecuencia de Caracteres:
Implementa una función que tome una cadena de texto y devuelva un array asociativo que muestre la frecuencia de cada carácter en la cadena.*/

function contarFrecuencia($stringParam)
{
    $frecuenciaCaracter = []; //Creamos un array

    //Cortar el string en caracteres -> str_split
    $caracteres = str_split($stringParam);//str_split sirve para dividir los caracteres del stringParam
    //print_r($caracteres);

    foreach ($caracteres as $caracter) {
        //[ "H" -> ]
        //isset() -> DETERMINA UN VALOR EXISTE, SI ESO PASA NOS DA UN TRUE
        //iset() se usa mucho en PHP
        if (isset($frecuenciaCaracter[$caracter])) { //Determina si existe un valor en la posición $caracter en el array $frecuenciaCaracter
            $frecuenciaCaracter[$caracter]++;//
        } else {
            $frecuenciaCaracter[$caracter] = 1;//
        }
    }
    return $frecuenciaCaracter;
}
contarFrecuencia("BREKKER");


/*4. Problema de Bucle Anidado:
Escribe un programa que utilice bucles anidados para imprimir un patrón de asteriscos en forma de pirámide.*/

function imprimirPiramide(){
    $filas = 5;

    //Primer bucle es para la ALTURA, No estamos recorriendo un array
    //Por eso empezamos desde 1 y se repite hasta la cantidad de altura que queremos que tenga
    for($i = 1; $i <= $filas; $i++){
        //Segundo bucle controla los espacios en blanco antes de dibujar los asteriscos
        for($espacios = 1; $espacios <= ($filas - $i); $espacios++){
            print " "; //print o echo es parta imprimir comentarios
        }

        //Tercer bucle es para controlar los asteriscos por fila
        //Formula para saber cuántos asteriscos necesitamos es (2 * $i -1)
        for($asteriscos = 1; $asteriscos <= (2 * $i -1); $asteriscos++){
            echo "*";
        }
        print "\n";
    }
}  

imprimirPiramide();



?>