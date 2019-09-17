<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'description' => $faker->paragraph,
        'price' => $faker->randomFloat($nbMaxDecimals = 4, $min = 20, $max = 200),
        'category_id' => rand(1,50),
        'image' => $faker->imageUrl(),
    ];
});
