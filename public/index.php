<?php

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalController;
use Router\RouterHandler;

require_once '../vendor/autoload.php';

// Obtener URL
$slug = $_GET['slug'] ?? "";
$slug = explode("/", $slug);

$resource = $slug[0] == "" ? "/" : $slug[0];
$id = $slug[1] ?? null;

// Incomes/1


// Intancia router
$router = new RouterHandler();

switch ($resource) {
    
        case '/':
        echo "Estas en la frontpage";
        break;

        case 'incomes':
        $method= $_POST['method'] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(IncomesController::class,$id);

        break;


        case 'withdrawals':
        
        $method= $_POST['method'] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(WithdrawalController::class,$id);

        break;


        default:
        // Redirigir a una página 404 o página personalizada
        header("Location: /404.php");  // O la URL que prefieras
        exit;  // Detener la ejecución del script para que no siga procesando
}
