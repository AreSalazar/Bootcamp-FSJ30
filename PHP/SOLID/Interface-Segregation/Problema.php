<?php

/* Interface-Segregation:
Principio de segregación de interfaces -> Si nosotros tenemos una interface demasiado genérica
es mejor dividirla en interfaces más específica */

interface Ave
{

    function comer();

    function caminar();

    function picar();

    function volar();
}


class Pinguino implements Ave
{
    function comer() {}

    function caminar() {}

    function picar() {}

    function volar()
    {
        // throw sirve para errores, sin "new Error" no funciona
        //return throw new Error("No puedo volar, a lo sumo caer con estilo");
        return new Exception("No puedo volar, a lo sumo caer con estilo");
    }
}

?>