<?php
echo "<h3>HOLIWIS LLEGASTE A PROCESAMIENTO DE DATOS</h3>";

/*CRUD
Create
Read
Update
Delete

Variables reservadas PHP
$_FILES -> Trabajar o manejar archivos subidos por el cliente
$_POST -> Manejamos datos ENVIADOS por el cliente
$_SESSION -> Nos permite guardar datos en el almacenamiento local del cliente
$_COOKIE -> Manejar las cookies del navegador del cliente*/



print_r($_POST);
print_r($_POST["nombre"]); //imprime el nombre que se ingresa en el formulario
//print_r($_GET);

class Usuario{
    private $nombre;
    private $edad;
    private $email;

    function __construct($nombreParam,$edadParam,$emailParam)
    {
        $this->nombre = $nombreParam;
        $this->edad = $edadParam;
        $this->email = $emailParam;
    }

    function getUser(){
        return $this;
    }
}

$user=new Usuario($_POST["nombre"],$_POST["edad"],$_POST["email"]);//Creamos un nuevo objeto de la clase Usuario y le pasamos los datos del formulario

print_r($user->getUser());//Imprimimos el objeto usuario

?>