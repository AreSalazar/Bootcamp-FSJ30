<?php

// En php ni en Typecript no existe la multiherencia
class Persona
{
    function comer() {}

    function dormir() {}

    function respirar() {}
}



// Lo podemos usar para servicios, donde el metodo tiene que funcionar de una manera específica
// La gente lo utiliza cuando se hace frameworks, porque ya vienen con funcionamiento específico que no va a cambiar
trait PersonaCantora
{
    function cantar()
    {
        echo "Lalala "; // Con trait hay que que darle una funcionalidad interna a las function y no dejarlas vacías sino da error
    } // En comparación de las interfaces
}




// Las interface son como contratos
// Cuando se implementa si o si estoy obligada a utilizar todas las funciones que tengan
interface PersonaHabladora
{
    function hablar();
}

interface PersonaCaminadora
{
    function caminar();
}

// Ahora el programador puede comer, dormir, respirar... Caminar y .... Hablar
class Programador extends Persona implements PersonaHabladora, PersonaCaminadora
{
    use PersonaCantora;

    function hablar() {}
    function caminar() {}
}


// Un bebe ahora solo puede comer, dormir y respirar
class Bebe extends Persona {}



// Ejemplo de uso del rait
$enoc = new Programador("Enoc", 23);
$enoc->cantar();
