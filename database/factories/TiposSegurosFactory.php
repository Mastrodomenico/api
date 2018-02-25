<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TipoSeguro::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'valor' => $faker->numerify('##.00'),
        'corretoras_id' => $faker->numberBetween(1,5)
    ];
});
