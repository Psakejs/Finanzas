<?php

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalController;

// use App\Enums\IncomeTypeEnum;
// use App\Enums\PaymentMethodEnum;

require_once 'vendor/autoload.php';

// $incomes_controller= new IncomesController;
// $incomes_controller->store([
//     "payment_method" => 2,//PaymentMethodEnum::BankAccount->value,
//     "type"=>  2,//IncomeTypeEnum::Salary->value,
//     "date"=>date("Y-m-d H:i:s"),
//     "amount"=>2000,
//     "description"=>"Salary minium"
// ]);

// $incomes_controller->show(2);

// $incomes_controller->index();


// $withdrawal_controller= new WithdrawalController;
// $withdrawal_controller->store([
//     "payment_method" => 1,//PaymentMethodEnum::BankAccount->value,
//     "type"=>  1,//IncomeTypeEnum::Salary->value,
//     "date"=>date("Y-m-d H:i:s"),
//     "amount"=>6000,
//     "description"=>"withdrawal"
// ]);


// $withdrawal_controller= new WithdrawalController;
// $withdrawal_controller->index();

// $incomes_controller= new IncomesController;
// $incomes_controller->destroy(1);

$incomes_controller= new IncomesController;
$incomes_controller->update(2,[
    "payment_method" => 2,//PaymentMethodEnum::BankAccount->value,
    "type"=>  2,//IncomeTypeEnum::Salary->value,
    "date"=>date("Y-m-d H:i:s"),
    "amount"=>6000,
    "description"=>"Fui editado Oh NOOOOOO"
]);
