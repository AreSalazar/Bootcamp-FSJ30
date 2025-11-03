<?php

/* Open-Close:
Principio de abiertamiento -> Las partes de nuestra aplicación tienen que estar abiertas para extensión y cerradas
para modificación */

class ConductorAutomovil
{
    function acelear(RollRoyce $auto) // Le decimos que $auto es de tipo RollRoyce, es una marca de carro
    { 
        $auto->aumentarVelocidad();
    }
}

class RollRoyce // Es una marca de carro
{ 
    function aumentarVelocidad()
    {
        echo "Estoy acelerando run run";
    }
}

// Ahora necesito que el conductor tambien maneje un Mercedes
class Mercedes{
    function aumentarVelocidad(){
        echo "Estoy acelerando run run pero más fuerte";
    }
}

$vehiculoHumilde = new RollRoyce();
$otroVehiculoHumilde = new Mercedes();//No funciona porque no es de tipo RollRoyce -> (RollRoyce $auto)

$schuma = new ConductorAutomovil();
$shuma->acelear($vehiculoHumilde);
