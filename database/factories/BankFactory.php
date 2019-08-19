<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bank;
use Faker\Generator as Faker;

$factory->define(Bank::class, function (Faker $faker) {
    return [
        //
        'name'=> $faker->text(10),
        'account'=> $faker->numberBetween(100000000000, 900000000000),
        'style_id' => $faker->numberBetween(1, App\BankStyle::count()),
    ];
});
