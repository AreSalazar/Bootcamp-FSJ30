<?php

class Database
{
    // En un trabajo, estos datos ya lo dan
    private $host = "localhost";
    private $db_name = "bootcampfsj30"; //Conexión con la BD que tengo en phpmyadmin
    private $username = "root";
    private $password = "";
    private $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        // min 1h y 15 min ver grabaacion, menciono algo del puerto de localhost. clase de MVC
        return $this->conn;
    }
}
?>