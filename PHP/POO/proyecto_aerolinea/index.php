<?php
print_r($_POST); //Imprime el array superglobal $_POST capturados en el formulario <form action="" method="POST">

//Llamamos la clas Aerolineas para crear un objeto

//SUSTITUOS DEL IMPORT:
//include -> Incluir el archivo y si no existe va a mostrar un error y continuar la ejecución del código
//require -> Requerir el archivo y si no existe va a mostrar un error y detener la ejecución del código

//include_once -> Incluir el archivo una sola vez, si se vuelve a llamar dentro de este archivo, va a usar la misma referencia
//require_once -> Requeris el archivo una sola vez, si se vuelve a llamar dentro de este archivo, va a usar la misma referencia

require_once './Aerolinea.php'; //Nos trae el código de este archivo

$aerolineas = [];

//isset -> sirve para validar si una variable está definida y no es null
if (isset($_POST['nombre_aerolinea'], $_POST['cantidad_aviones'], $_POST['tipo_aerolinea'])) {
    
    $nombre = $_POST['nombre_aerolinea'];
    $cant_aviones = $_POST['cantidad_aviones'];
    $tipo_aero = $_POST['tipo_aerolinea'];

    $aerolineacita = new Aerolinea($nombre, $cant_aviones, $tipo_aero);

    print_r($aerolineacita);
    array_push($aerolineas, $aerolineacita);//Le paso el objeto aerolineacita (donde está los datos del form) al array aerolineas

    echo "<h1>Aerolíneas hasta ahora</h1><br>";
    print_r($aerolineas);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica CRUD Aerolineas</title>
</head>

<body style="background-color:gray;">
    <h1>Holiwis Bienvenidos a Aerolíneas</h1>
    <h3>Crear una nueva aerolínea</h3>

    <!--POR MEDIO DE ACTION PODEMOS DIRECCIONAR LA ACCIÓN A OTRA PÁGINA O EN LA MISMA-->
    <!--Cuál es la la acción? Enviar los datos del formulario a este mismo archivo index.php-->
    <form action="" method="POST"><!--POST ES PARA ENVIAR DATOS-->
        <label for="nombre_aerolinea">Nombre Aerolínea: </label>
        <input type="text" name="nombre_aerolinea" required>

        <label for="cantidad_aviones">Cantidad Aviones : </label>
        <input type="text" name="cantidad_aviones" required>

        <label for="tipo_aerolinea">Tippo de Aerolínea: </label>
        <select input type="text" name="tipo_aerolinea" required>
            <option value="Privado">Privado</option>
            <option value="Comercial">Comercial</option>
            <option value="Nacional">Nacional</option>
            <option value="Carga">Carga</option>
        </select>

        <button type="submit">Crear</button>
    </form>
</body>

</html>