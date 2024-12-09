<?php

namespace App\Controllers;

use Database\PDO\Connection;

class WithdrawalController
{
    public function index()
    {
        $connection = Connection::getInstance();

        $stmt = $connection->prepare("SELECT * FROM withdrawals");
        $stmt->execute();

        // Asociar columnas específicas
        $stmt->bindColumn('id', $id);
        $stmt->bindColumn('type', $type);
        $stmt->bindColumn('payment_method', $payment_method);
        $stmt->bindColumn('amount', $amount);

        while ($stmt->fetch()) {
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$type}</td>";
            echo "<td>{$payment_method}</td>";
            echo "<td>{$amount}</td>";
            echo "</tr>";
        }
    }

    public function create()
    {
        echo "IncomesController@create";
    }

    public function store($data)
    {
        $connection = Connection::getInstance();

        $stmt = $connection->prepare(
            "INSERT INTO withdrawals (payment_method, type, date, amount, description) 
            VALUES (:payment_method, :type, :date, :amount, :description)"
        );

        $stmt->execute([
            ':payment_method' => $data['payment_method'],
            ':type' => $data['type'],
            ':date' => $data['date'],
            ':amount' => $data['amount'],
            ':description' => $data['description']
        ]);
    }

    public function show($id)
    {
        $connection = Connection::getInstance();

        $stmt = $connection->prepare("SELECT * FROM withdrawals WHERE id = :id");
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
            "UPDATE withdrawals SET 
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
        $stmt = $connection->prepare("DELETE FROM withdrawals WHERE id = :id");
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
