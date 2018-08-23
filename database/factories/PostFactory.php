<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'post_type'=>$faker->randomElement(['formation', 'stage']),
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),

        'begin_date' => $faker->dateTime(),
        'end_date' => $faker->dateTime(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9000.00),
        'max_students' => $faker->numberBetween(5, 50),
    ];
});
