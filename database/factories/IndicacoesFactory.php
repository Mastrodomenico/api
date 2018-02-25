<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Indicacao::class, function (Faker $faker) {

    $status = ['analise','negociacao','fechado','inativo'];

    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'telefone' => $faker->numerify('(##) #####-####'),
        'status' => $status[$faker->numberBetween(0,3)],
        'tipos_seguros_id' => $faker->numberBetween(1,50),
        'clientes_agentes_id' => $faker->numberBetween(1,20)
    ];
});

