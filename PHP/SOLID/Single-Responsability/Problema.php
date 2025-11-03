<?php

// Single-Responsability:
// Principio de responsabilidad unica -> Buscamos que cada parte (clase, componente, etc) de nuestro codigo se dedique y funcione para una sola cosa
// En SOLID son principios y no pilares porque se pueden sacrificar por cuestión de tiempo a diferencia de los pilares

class MenuTienda
{

    function mostrarMenu() {} // SI

    function agregarProductoCarrito() {} // NO

    function sumarTotalCarrito() {} // NO

    function eliminarUsuario() {} // NO

    function logIn() {} // NO

    function logOut() {} // NO

    function registrarUsuario() {} // NO


}
