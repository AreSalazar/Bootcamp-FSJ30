<?php

function busquedaLineal($lista, $elementoBuscado)
{
    for ($i = 0; $i < count($lista); $i++) {
        if ($lista[$i] === $elementoBuscado) {
            return $i;
        }
    }
    return -1; //No encontramos el elemento
}


//Ejemplo práctico con estudiantes
$estudiantes = [
    "Alejandro",
    "Alvin",
    "Andrea",
    "Alejandra"
];

$posicion = busquedaLineal($estudiantes, "Andrea");

if ($posicion !== -1) {
    echo "Encontré a Andrea en la posición: " . $posicion . "\n";
    echo "En la lista está como: " . $estudiantes[$posicion] . "\n";
} else {
    echo "Andrea no está en la lista de estudiantes\n";
}


//----------------Buscar pupusas------------------------
function busquedaLinealPupusas($lista, $pupusaBuscada)
{
    foreach ($lista as $index => $pupusa) {
        if ($pupusa === $pupusaBuscada) {
            return $index;
        }
    }
    return -1; //Retorna -1 si no encuentra la pupusa
}

//Ejemplo práctico con pupusas
$listaPupusas = [
    "Queso",
    "Frijol",
    "Revuelta",
    "Loroco",
    "Chicharrón",
    "Ayote",
    "Ajo"
];

$posicion = busquedaLinealPupusas($listaPupusas, "Loroco");

if ($posicion != -1) {
    echo "Encontré la pupusa buscada en la posición: " . $posicion . "\n";
    echo "En la lista está como: " . $listaPupusas[$posicion] . "\n";
} else {
    echo "La pupusa no está en la lista\n";
}
?>
