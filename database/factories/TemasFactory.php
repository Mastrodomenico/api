<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Tema::class, function (Faker $faker) {
    return [
        'cor_1' => $faker->hexColor,
        'cor_2' => $faker->hexColor,
        'cor_3' => $faker->hexColor
    ];
});
