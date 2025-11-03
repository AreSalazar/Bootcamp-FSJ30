<?php
require_once './models/Estudiante.php';
require_once './config/Database.php';
require_once './models/Curso.php';


class EstudianteController
{
    private $estudianteModel;
    private $cursoModel;

    public function __construct()
    {
        $database = new Database(); // Crear una instancia de la clase Database
        $db = $database->getConnection(); // Obtener la conexión a la base de datos
        $this->estudianteModel = new Estudiante($db); // Instancia del modelo Estudiante
        $this->cursoModel = new Curso($db); // Instancia del modelo Curso
    }

    // Método para mostrar la lista de estudiantes  
    public function read()
    {
        $estudiantes = $this->estudianteModel->getAll(); // Obtener todos los estudiantes

        include_once './views/home.php'; //include_once es para incluir el archivo una sola vez
    }

    // Método para crear un nuevo estudiante
    public function create()
    {
        $cursos = $this->cursoModel->getAll(); // Obtener todos los cursos
        $estudiante = null;

        // Manejar el envío del formulario
        if ($_SERVER["REQUEST_METHOD"] === "POST") {// Verificar si el formulario ha sido enviado
            $nombre = $_POST['nombre']; // Obtener el nombre del formulario
            $edad = $_POST['edad']; // Obtener la edad del formulario
            $promedio = $_POST['promedio']; // Obtener el promedio del formulario
            $id_curso = $_POST['curso']; // Obtener el ID del curso del formulario

            $this->estudianteModel->create($nombre, $edad, $promedio, $id_curso); // Llamar al método create del modelo Estudiante
            header("Location: ./index.php?action=read"); // Redirigir a la página principal después de crear el estudiante
            exit();// Salir del script para evitar que se ejecute el código siguiente
        }

        include_once './views/create.php'; //include_once es para incluir el archivo una sola vez
    }

    // Método para actualizar un estudiante existente
    public function update($id)
    {
        $cursos = $this->cursoModel->getAll();

        $estudiante = $this->estudianteModel->getById($id);

        // Manejar el envío del formulario
        if ($_SERVER["REQUEST_METHOD"] === "POST") {// Verificar si el formulario ha sido enviado
            $id = $_POST['id'];// Obtener el ID del formulario
            $nombre = $_POST['nombre'];// Obtener el nombre del formulario
            $edad = $_POST['edad'];// Obtener la edad del formulario
            $promedio = $_POST['promedio'];// Obtener el promedio del formulario
            $id_curso = $_POST['curso'];// Obtener el ID del curso del formulario

            $this->estudianteModel->update($id, $nombre, $edad, $promedio, $id_curso);// Llamar al método update del modelo Estudiante
            header("Location: ./index.php?action=read");// Redirigir a la página principal después de actualizar el estudiante
            exit();// Salir del script para evitar que se ejecute el código siguiente
        }

        include_once './views/edit.php';//include_once es para incluir el archivo una sola vez
    }

    // Método para eliminar un estudiante
    public function delete($id)
    {
        // Verificar si se ha proporcionado un ID válido
        if ($id !== null) {
            $this->estudianteModel->delete($id);
            header("Location: ./index.php?action=read");// Redirigir a la página principal después de eliminar el estudiante
            exit();
        }
    }
}
?>