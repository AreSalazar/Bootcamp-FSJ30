<?php

interface IAve
{

    function comer();

    function caminar();

    function picar();
}

interface IAveVoladora
{
    function volar();
}

class Dodo implements IAve
{
    function comer() {}

    function caminar() {}

    function picar() {}
}

?>
