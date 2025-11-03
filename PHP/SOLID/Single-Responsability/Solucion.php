<?php

/*Principio de responsabilidad única -> Buscamos que cada parte (clase, componente, etc.)
de nuestro código se dedique y funcione para una sola cosa*/

//Se hicieron más clases para que cada una tenga menos responsablidades (functions) y no saturarla de tarea

class MenuTienda
{
    function mostrarMenu() {}
}


class Carrito
{
    function agregarProductoCarrito() {}

    function sumarTotalCarrito() {}
}


class Sesion
{

    function logIn() {}

    function logOut() {}
}


class Usuario
{
    function eliminarUsuario() {}

    function registerUsuario() {}
}
