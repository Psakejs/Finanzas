<?php

namespace App\Controllers;

use Database\PDO\Connection;

class IncomesController
{
    public function index()
    {
        $connection = Connection::getInstance();

        $stmt = $connection->prepare("SELECT * FROM incomes");
        $stmt->execute();

        $results = $stmt->fetchAll();

        require("./../resources/views/incomes/index.php");

    }

    public function create()
    {
       require("./../resources/views/incomes/create.php");
    }

    public function store($data)
    {
        $connection = Connection::getInstance();

        $stmt = $connection->prepare(
            "INSERT INTO incomes (payment_method, type, date, amount, description) 
            VALUES (:payment_method, :type, :date, :amount, :description)"
        );

        $stmt->execute([
            ':payment_method' => $data['payment_method'],
            ':type' => $data['type'],
            ':date' => $data['date'],
            ':amount' => $data['amount'],
            ':description' => $data['description']
        ]);

        header("Location: /incomes");
    }

    public function show($id)
    {
        $connection = Connection::getInstance();

        $stmt = $connection->prepare("SELECT * FROM incomes WHERE id = :id");
        $stmt->execute([':id' => $id]);

        $result = $stmt->fetch();
        if ($result) {
            echo "El registro dice que gastaste {$result['amount']}";
        } else {
            echo "Registro no encontrado.";
        }
    }

    public function edit($id)
    {
        echo "IncomesController@edit";
    }

    public function update($id, $data)
    {
        $connection = Connection::getInstance();

        $stmt = $connection->prepare(
            "UPDATE incomes SET 
                payment_method = :payment_method, 
                type = :type, 
                date = :date, 
                amount = :amount, 
                description = :description 
            WHERE id = :id"
        );

        $stmt->execute([
            ':id' => $id,
            ':payment_method' => $data['payment_method'],
            ':type' => $data['type'],
            ':date' => $data['date'],
            ':amount' => $data['amount'],
            ':description' => $data['description']
        ]);
    }

    public function destroy($id)
    {
        $connection = Connection::getInstance();

        // Inicia la transacción
        // $connection->beginTransaction();

        // Elimina el registro
        $stmt = $connection->prepare("DELETE FROM incomes WHERE id = :id");
        $stmt->execute([':id' => $id]);

        // Confirma la transacción
        // $sure=readline(" De verdad quieres eliminarlo?");
        // if($sure=="si"){
            // $connection->commit();
            echo "Registro eliminado con éxito.";
        // }else{
        //     $connection->rollBack();
        //     echo "No se eliminó el registro.";
        // }

    }
}
