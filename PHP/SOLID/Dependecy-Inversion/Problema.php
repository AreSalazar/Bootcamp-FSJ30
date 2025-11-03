<?php

/* Dependecy-Inversion:
 Es el principio de Inversión de Dependencias (Dependecy / Inversion Principle - DIP)
 Los módulos de alto nivel no deben depender de los módulos de bajo nivel.
 Ambos deben depender de abstracciones.
 Las abstracciones no deben depender de los detalles.
 Los detalles deben depender de las abstracciones. */

class BDConexion
{
    private $adaptador;
    private $adaptador2;

    function __construct()
    {
        $this->adaptador = new MysqlDB(); //Le tengo que pasar la conexión de la BD, hay un problema
        $this->adaptador2 = new MongoDB();
    }

    function conectar()
    {
        $this->adaptador->conectarDB();
        $this->adaptador2->conectarDB();
    }
}

class MySQLDB
{
    // Credenciales

    function conectarDB()
    {
        // Lógica para conectar la base de datos
    }
}

class MongoDB
{
    // Credenciales

    function conectarDB()
    {
        // Lógica para conectar la base de datos
    }
}

$conecction = new MysqlDB();


?>