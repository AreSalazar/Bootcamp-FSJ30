<?php
//print_r($_POST); //Imprime el array superglobal $_POST capturados en el formulario <form action="" method="POST">
require_once './Aerolinea.php'; //Nos trae el código de este archivo, funciona como los imports, por lo tanto deben de ir hasta arriba

// $_SESSION -> Variable reservada para almacenar datos (Array assoc)
//INICIAMOS LA SESION PARA PODER UTILIZAR LA VARIABLE $_SESSION

session_start(); //Iniciar la sesión, siempre va al principio del archivo

//print_r($_SESSION);

//Llamamos la clase Aerolineas para crear un objeto

// include -> Incluir el archivo y si no existe, mostrar un error y continuar la ejecucion del codigo
// require -> Requerir el archivo y si no existe, mostrar un error y detener la ejecucion del codigo

// include_once -> Incluir el archivo una sola vez, si se vuelve a llamar dentro de este archivo, va a usar la misma referencia
// require_once -> Requerir el archivo una sola vez, si se vuelve a llamar dentro de este archivo, va a usar la misma referencia


print_r($_GET);


// Persistencia de datos
// Auxiliar para prechequear session
if (!isset($_SESSION['aerolineas'])) {
    $_SESSION['aerolineas'] = [];
}


$aerolineas = $_SESSION['aerolineas'];

//isset -> sirve para validar si una variable está definida y no es null
//Create form
if (isset($_POST['createForm'])) {

    if (isset($_POST['nombre_aerolinea'], $_POST['cantidad_aviones'], $_POST['tipo_aerolinea'])) {

        $id = rand(1, 1000);
        $nombre = $_POST['nombre_aerolinea'];
        $cant_aviones = $_POST['cantidad_aviones'];
        $tipo_aero = $_POST['tipo_aerolinea'];

        $aerolineacita = new Aerolinea($id, $nombre, $cant_aviones, $tipo_aero);

        print_r($aerolineacita);
        array_push($aerolineas, $aerolineacita); //Le paso el objeto aerolineacita (donde está los datos del form) al array aerolineas
        //$aerolineas[] = $aerolineacita;

        // $_SESSION['aerolineas'][] = $aerolineas; otra forma de pushear los datos
        $_SESSION['aerolineas'] = $aerolineas;

        //echo "<h1>Aerolineas hasta ahora</h1><br>"; 
        //print_r($_SESSION['aerolineas']);
    }
}

//Buscar una aerolinea en particular a traves de su ID

function obtenerAerolineaPorId($aerolineas, $id)
{ //función que recibe un array de aerolineas y un id para buscar una aerolinea en particular
    foreach ($aerolineas as $aerolinea) { //Recorro el array de aerolineas
        if ($aerolinea->getId() == $id) { //Si el id de la aerolinea es igual al id que recibí por parámetro
            return $aerolinea; //entonces retorno esa aerolinea
        }
    }
}

//Edit form

if (isset($_POST['updateForm'])) {
    //La logica para actualizar una aerolinea
    foreach ($aerolineas as $aerolinea) { //Recorro el array de aerolineas
        if ($aerolinea->getId() == $_GET['editar']) { //Si el id de la aerolinea es igual al id que recibí por parámetro por GET

            //Entonces actualizo los datos de esa aerolinea con los datos que recibí por POST
            $aerolinea->setNombre($_POST['nombre_aerolinea']);
            $aerolinea->setCant_aviones($_POST['cantidad_aviones']);
            $aerolinea->setTipo_aerolinea($_POST['tipo_aerolinea']);
        }
    }
    header('Location: /PHP/POO/proyecto_aerolinea/index.php'); //Redirecciono a la misma página para que no se envíen los datos del formulario nuevamente
}

//Delete

if (isset($_GET['eliminar'])) {
    //La lógica para eliminar una aerolinea
    print_r($_GET['eliminar']); //Muestro el id que quiero eliminar

    foreach ($aerolineas as $idx => $aerolinea) {

        if ($aerolinea->getId() == $_GET['eliminar']) {
            unset($aerolineas[$idx]); //unset elimina un elemento de un array, en este caso elimino la aerolinea que tiene el id que recibí por GET
            break;
        }
    }

    $_SESSION['aerolineas'] = $aerolineas;
    header('Location: /PHP/POO/proyecto_aerolinea/index.php'); //Redirecciono a la misma página para que no se envíen los datos del formulario nuevamente
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica CRUD Aerolineas</title>
</head>

<body style="background-color: gray;">
    <h1>Holiwis bienvenido a Aerolineas</h1>

    <?php
    if (isset($_GET['editar'])) { //Si existe la variable editar, osea tiene un valor para editar en el array superglobal $_GET

        //Llamo a la función obtenerAerolineaPorId y le paso el array de aerolineas y el id que recibí por GET
        $aerolineaEditable = obtenerAerolineaPorId($aerolineas, $_GET['editar']);
        print_r($aerolineaEditable);
    ?>
        <!-- FORMULARIO PARA EDITAR UNA AEROLINEA-->
        <h3>Editar una nueva aerolinea</h3>

        <!--POR MEDIO DE ACTION PODEMOS DIRECCIONAR LA ACCIÓN A OTRA PÁGINA O EN LA MISMA-->
        <!--Cuál es la la acción? Enviar los datos del formulario a este mismo archivo index.php-->
        <form action="" method="POST"> <!--POST ES PARA ENVIAR DATOS-->
            <input type="hidden" name="updateForm" value="editForm">

            <label for="nombre_aerolinea">Nombre Aerolínea: </label>
            <input type="text" name="nombre_aerolinea" value="<?php echo $aerolineaEditable->getNombre() ?>" required><!--Prechequeo del nombre de la aerolinea a editar-->

            <label for="cantidad_aviones">Cantidad Aviones : </label>
            <input type="text" name="cantidad_aviones" value="<?php echo $aerolineaEditable->getCant_aviones() ?>" required><!--Prechequeo de la cantidad de aviones a editar-->

            <label for="tipo_aerolinea">Tippo de Aerolínea: </label>

            <select type="text" name="tipo_aerolinea"><!--Prechequeo del tipo de aerolinea a editar-->
                <option value="Privado" <?php echo ($aerolineaEditable->getTipo_aerolinea() === 'Privado') ? 'selected' : '' ?>>Privado</option>
                <option value="Comercial" <?php echo ($aerolineaEditable->getTipo_aerolinea() === 'Comercial') ? 'selected' : '' ?>>Comercial</option>
                <option value="Carga" <?php echo ($aerolineaEditable->getTipo_aerolinea() === 'Carga') ? 'selected' : '' ?>>Carga</option>
                <option value="Nacional" <?php echo ($aerolineaEditable->getTipo_aerolinea() === 'Nacional') ? 'selected' : '' ?>>Nacional</option>

            </select>

            <button type="submit">Editar</button>
        </form>


    <?php
    } else {
    ?>
        <!-- FORMULARIO PARA CREAR UNA AEROLINEA-->
        <h3>Crear una nueva aerolinea</h3>

        <!--POR MEDIO DE ACTION PODEMOS DIRECCIONAR LA ACCIÓN A OTRA PÁGINA O EN LA MISMA-->
        <!--Cuál es la la acción? Enviar los datos del formulario a este mismo archivo index.php-->
        <form action="" method="POST"><!--POST ES PARA ENVIAR DATOS-->
            <input type="hidden" name="createForm" value="createForm">

            <label for="nombre_aerolinea">Nombre Aerolínea: </label>
            <input type="text" name="nombre_aerolinea" required>

            <label for="cantidad_aviones">Cantidad Aviones : </label>
            <input type="text" name="cantidad_aviones" required>

            <label for="tipo_aerolinea">Tipo de Aerolínea: </label>
            <select type="text" name="tipo_aerolinea" required>
                <option value="Privado">Privado</option>
                <option value="Comercial">Comercial</option>
                <option value="Carga">Carga</option>
                <option value="Nacional">Nacional</option>
            </select>

            <button type="submit">Crear</button>
        </form>

    <?php
    }
    ?>

    <main>
        <table>
            <thead>
                <th># ID</th>
                <th>Nombre</th>
                <th>Cantidad de aviones</th>
                <th>Tipo Aerolinea</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php
                foreach ($aerolineas as $aero) { //aero es la posición de la variable $aerolineas
                    echo "<tr>
                            <td>{$aero->getId()}</td>
                            <td>{$aero->getNombre()}</td>
                            <td>{$aero->getCant_aviones()}</td>
                            <td>{$aero->getTipo_aerolinea()}</td>
                            <td>
                            <a href='?editar={$aero->getId()}'>Editar</a>
                            <a href='?eliminar={$aero->getId()}'>Eliminar</a>
                            </td>
                        </tr> ";
                }
                ?>
            </tbody>

        </table>
    </main>
</body>

</html>