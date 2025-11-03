<?php

/* Liskov-Substitution:
Principio de sustitución de Liskov -> Podemos reemplazar la clase hija con la clase padre
sin que esto rompa el funcionamiento (no tiene que dar errores) */

// Con liskov es buscar esas excepciones para no romper la funcionalidad

class Persona
{
    function comer() {}

    function dormir() {}

    function respirar() {}

    function hablar() {}

    function caminar() {}
}

class Programador extends Persona {}

class Bebe extends Persona
{
    function hablar()
    {
        return new Exception("Un bebe no habla.");
    }
}
