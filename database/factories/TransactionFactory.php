<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        //
        'type_of_transaction'=> $faker->numberBetween(1, 2),
        'amount'=> $faker->randomFloat(3 , 200, 900000),
        'bank_id' => $faker->numberBetween(1, App\Bank::count()),
    ];
});
