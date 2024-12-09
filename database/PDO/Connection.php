<?php 
namespace Database\PDO;
use PDO;
use PDOException;

class Connection
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=finanzas_personales;port=3307;charset=utf8";
        $username = "root";
        $password = "12345912";

        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Modo de errores
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Modo de obtención
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Devuelve la instancia de la clase (singleton)
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->connection; // Devuelve la conexión PDO
    }
}

// $server="localhost";
// $database="finanzas_personales";
// $username="root";
// $password="12345912";
// $port=3307;


// $connection = new PDO("mysql:host=$server;dbname=$database;port=$port",$username,$password);

// $setnames= $connection->prepare("SET NAMES 'utf8'");
// $setnames->execute();

// echo "<pre>";
// print_r($setnames);
// echo "</pre>";