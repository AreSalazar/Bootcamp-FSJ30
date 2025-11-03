<?php
// Los modelos representan la estructura de los datos y la lógica de negocio.
// En este caso, la clase Estudiante podría tener propiedades y métodos relacionados con los estudiantes.
// Los modelos actúan como una capa intermedia entre la base de datos y los controladores.

class Estudiante
{
    //representación de la tabla
    private $id;
    private $nombre;
    private $edad;
    private $promedio;
    private $id_curso;
    private $table_name = "estudiantes"; //Tabla de estudiantes de la BD
    private $db_connection;

    public function __construct($db)
    { //Va a recibir la Base de Datos
        $this->db_connection = $db;
    }

    /**
     * Recupera todos los estudiantes con su información de curso correspondiente
     * 
     * Ejecuta una consulta JOIN entre las tablas de estudiantes y cursos
     * para obtener la información completa del estudiante incluyendo el nombre de su curso
     *
     * @return array Array asociativo que contiene todos los estudiantes con sus datos de curso:
     *               - id: ID del estudiante
     *               - nombre: Nombre del estudiante
     *               - edad: Edad del estudiante
     *               - promedio: Promedio del estudiante
     *               - id_curso: ID del curso
     *               - nombre_curso: Nombre del curso
     **/

    // Métodos para acceder a los datos del estudiante
    public function getAll()
    {
        $query = "SELECT 
        estudiantes.id, 
        estudiantes.nombre, 
        estudiantes.edad, 
        estudiantes.promedio, 
        estudiantes.id_curso, 
        cursos.nombre_curso 
        FROM  {$this->table_name} INNER JOIN cursos ON estudiantes.id_curso = cursos.id_curso"; // Consulta SQL para obtener todos los estudiantes con información del curso

        $sentence = $this->db_connection->prepare($query); // Esta línea prepara la consulta en un gbd (gestor de base de datos)
        $sentence->execute(); // esta línea ejecuta la consulta
        
        // FETCH_ASSOC: Devuelve un array indexado por el nombre de la columna, array indexado es un array donde se puede acceder a los valores por el índice numérico
        // fetchAll: Devuelve todas las filas del conjunto de resultados
        // :: indica que es una constante de la clase PDO, sirve para ejecutar métodos estáticos y sin pasarle un objeto
        return $sentence->fetchAll(PDO::FETCH_ASSOC); //devuelve todos los resultados en un array asociativo, un array asociativo es un array donde las claves son los nombres de las columnas, es decir, un array donde se puede acceder a los valores por el nombre de la columna
    }

    /**
     * Crea un nuevo registro de estudiante en la base de datos.
     * 
     * @param string $nombre    Nombre del estudiante
     * @param int    $edad      Edad del estudiante
     * @param float  $promedio  Promedio académico del estudiante
     * @param int    $id_curso  Identificador del curso al que pertenece el estudiante
     * 
     * @return bool  Retorna true si la inserción fue exitosa, false en caso contrario
     */

    // Método para crear un nuevo estudiante
    public function create($nombre, $edad, $promedio, $id_curso){ // Recibe los datos del estudiante
        $query = "INSERT INTO {$this->table_name} (nombre, edad, promedio, id_curso) VALUES (:nombre, :edad, :promedio, :id_curso)"; // Consulta SQL para insertar un nuevo estudiante
        $sentence = $this->db_connection->prepare($query); // Preparar la consulta en el gestor de base de datos
        // Vincular los parámetros con los valores proporcionados
        //bindParam es un método de PDOStatement que vincula un parámetro de la consulta SQL con una variable PHP
        $sentence->bindParam(':nombre', $nombre);
        $sentence->bindParam(':edad', $edad);
        $sentence->bindParam(':promedio', $promedio);
        $sentence->bindParam(':id_curso', $id_curso);

        // Ejecutar la consulta y retornar true si fue exitosa, false en caso contrario
        if($sentence->execute()){
            return true;
        }
        return false;
    }

    /**
     * Actualiza los datos de un estudiante en la base de datos
     * 
     * @param int $id ID del estudiante a actualizar
     * @param string $nombre Nuevo nombre del estudiante
     * @param int $edad Nueva edad del estudiante
     * @param float $promedio Nuevo promedio del estudiante
     * @param int $id_curso Nuevo ID del curso al que pertenece el estudiante
     * 
     * @return bool Retorna true si la actualización fue exitosa, false en caso contrario
     */

    // Método para actualizar un estudiante existente
    public function update($id, $nombre, $edad, $promedio, $id_curso){// Recibe el ID del estudiante y los nuevos datos
        $query = "UPDATE {$this->table_name} SET nombre = :nombre, edad = :edad, promedio = :promedio, id_curso = :id_curso WHERE id = :id";// Consulta SQL para actualizar el estudiante especificado por su ID. SET es para establecer los nuevos valores de las columnas
        $sentence = $this->db_connection->prepare($query);// Preparar la consulta en el gestor de base de datos
        // Vincular los parámetros con los valores proporcionados
        //bindParam es un método de PDOStatement que vincula un parámetro de la consulta SQL con una variable PHP
        $sentence->bindParam(':id', $id);
        $sentence->bindParam(':nombre', $nombre);
        $sentence->bindParam(':edad', $edad);
        $sentence->bindParam(':promedio', $promedio);
        $sentence->bindParam(':id_curso', $id_curso);
        
        // Ejecutar la consulta y retornar true si fue exitosa, false en caso contrario
        if($sentence->execute()){
            return true;
        }
        return false;
    } 

    /**
     * Obtiene un estudiante específico de la base de datos por su ID
     * 
     * @param int $id El ID del estudiante a buscar
     * @return array|false Retorna un array asociativo con los datos del estudiante si se encuentra,
     *                     o false si no existe
     */

    // Método para obtener un estudiante por su ID
    public function getById($id){
        $query = "SELECT * FROM {$this->table_name} WHERE id = :id";// Consulta SQL para seleccionar el estudiante con el ID especificado
        $sentence = $this->db_connection->prepare($query);// Preparar la consulta en el gestor de base de datos
        // Vincular el parámetro con el valor proporcionado
        //bindParam es un método de PDOStatement que vincula un parámetro de la consulta SQL con una variable PHP
        $sentence->bindParam(':id', $id);
        $sentence->execute();
        return $sentence->fetch(PDO::FETCH_ASSOC);// Devuelve un array asociativo con los datos del estudiante
    }

    /**
     * Elimina un registro de la tabla estudiante según el ID proporcionado
     * 
     * @param int $id ID del estudiante a eliminar
     * @return bool Retorna true si la eliminación fue exitosa, false en caso contrario
     */
    
    // Método para eliminar un estudiante por su ID
    public function delete($id){
        $query = "DELETE FROM {$this->table_name} WHERE id = :id"; // Consulta SQL para eliminar el estudiante con el ID especificado
        $sentence = $this->db_connection->prepare($query);// Preparar la consulta en el gestor de base de datos
        // Vincular el parámetro con el valor proporcionado
        //bindParam es un método de PDOStatement que vincula un parámetro de la consulta SQL con una variable PHP
        $sentence->bindParam(':id', $id);

        // Ejecutar la consulta y retornar true si fue exitosa, false en caso contrario
        if($sentence->execute()){
            return true;
        }
        return false;
    }
}
?>