<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        "name" =>$faker->name,
        "pn_number" =>$faker->phoneNumber,
        "email" =>$faker->safeEmail,
        "district" =>$faker->city,
          ];
});
