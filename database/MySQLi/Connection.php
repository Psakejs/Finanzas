<?php

namespace Database\MySQLi;

class Connection
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $this->connection = new \mysqli("localhost", "root", "12345912", "finanzas_personales",3307);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

     // Agrega este método
     public function prepare($sql)
     {
         return $this->connection->prepare($sql);
     }
}

// $server = "localhost";
// $database = "finanzas_personales";
// $username = "root";
// $password = "12345912";
// $port = 3307;

// // Forma procedural
// // $mysqli = mysqli_connect($server, $username, $password, $database, $port);

// // COmporbar conexion de manera procedural
// // if(mysqli_connect_errno()){
// //     echo "Error al conectar a la base de datos";
// //     exit();
// // }


// // orientada a objetos
// $mysqli = new mysqli($server, $username, $password, $database, $port);

// // Comprobar conexion de manera orientada a objetos
// if ($mysqli->connect_errno) {
//     echo "Error al conectar a la base de datos";
//     exit();
// }

// // Nos ayuda a poder usar cualquier caracter en nuestras consultas

// $setnames = $mysqli->prepare("SET NAMES 'utf8'");
// $setnames->execute();

// echo "<pre>";
// print_r($setnames);
// echo "</pre>";