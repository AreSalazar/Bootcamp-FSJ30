<?php
// La interfaz solo define métodos. Sirve para establecer reglas y no poner cualquier otras cosas y no se rompa 
// Las clases nos permite crear objetos, las interfaces NO.

interface IAdaptador
{
    function conectarDB(); //Este es un método, no es -> function conectarDB(){}
}

class BDConexion
{
    private $adaptador;

    function __construct(IAdaptador $bd)
    {
        $this->adaptador = $bd;
    }

    function conectar()
    {
        $this->adaptador->conectarDB();
    }
}

class MySQLDB implements IAdaptador
{
    // Credenciales

    function conectarDB()
    {
        // Lógica para conectar la base de datos
        echo "Me estoy conectando a MySQLDB";
    }
}

class MongoDB implements IAdaptador
{
    // Credenciales

    function conectarDB()
    {
        // Lógica para conectar la base de datos
        echo "Me estoy conectando a MongoDB";
    }
}


class FirestoreBD implements IAdaptador
{
    function conectarDB()
    {
        // Lógica para conectar la base de datos
        echo "Me estoy conectando a FirestoreBD";
    }
}

$mysql = new MySQLDB();
$mongo = new MongoDB();
$firestore = new FirestoreBD();

$bdconexionMongo = new BDConexion($mongo);
$bdConexion = new BDConexion($mysql);
$bdconexionFirestore = new BDConexion($firestore);

$bdConexion->conectar();
$bdconexionMongo->conectar();
$bdFirestore->conectar();
