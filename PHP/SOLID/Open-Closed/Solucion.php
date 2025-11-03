<?php

class ConductorAutomovil
{
    // Creamos un PADRE (Auto), para pasarle a sus HIJOS RollRoyce y Mercedes
    function acelear(Auto $auto) // Le decimos que $auto es de tipo Auto, para que sea utilizado tanto para RollRoyce como por Mercedes
    { 
        $auto->aumentarVelocidad();
    }
}

// Clase intermedia -> Contiene el método principal del funcionamiento y luego extendemos (herencia)

class Auto{
    function aumentarVelocidad(){
        echo "Estoy acelerando brum";
    }
}

class RollRoyce extends Auto// Es una marca de carro
{ 
    function aumentarVelocidad()
    {
        echo "Estoy acelerando run run";
    }
}

// Ahora necesito que el conductor tambien maneje un Mercedes
class Mercedes extends Auto{
    function aumentarVelocidad(){
        echo "Estoy acelerando run run pero más fuerte";
    }
}

$vehiculoHumilde = new RollRoyce();
$otroVehiculoHumilde = new Mercedes(); // Ahora sí funciona, porque creamos la clase intermedia genéreica

$schuma = new ConductorAutomovil();
$shuma->acelear($vehiculoHumilde);


?>