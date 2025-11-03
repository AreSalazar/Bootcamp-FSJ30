<?php
include_once './controllers/EstudianteController.php';
$controller = new EstudianteController(); //creo el objeto controlador, sirve para llamar a las funciones del controlador y luego cargar las vistas
// Los controladores se encargan de recibir las peticiones del usuario, procesarlas (a veces interactuando con el modelo) y decidir qué vista mostrar en respuesta.
// Los controladores actúan como intermediarios entre el modelo (la lógica de negocio y los datos) y la vista (la presentación de la información al usuario).

$action = isset($_GET['action']) ? $_GET['action'] : 'read'; //Esta acción decidirá qué vista va a cargarse
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'read':
        $controller->read(); //NO tengo acción se muestra el HOME (index.php), el controlador llama a la función read
        break;
    case 'create':
        $controller->create(); //SI tengo acción se muestra el agregar alumno (create.php)
        break;
    case 'update':
        $controller->update($id); //SI tengo acción se muestra el editar alumno (update.php)
        break;
    case 'delete':
        $controller->delete($id); //SI tengo acción se elimina el alumno
        break;
}
?>