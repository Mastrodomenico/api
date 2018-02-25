<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Titular::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'data_nascimento' => $faker->date('Y-m-d'),
        'cpf' => $faker->numerify('###.###.###-##'),
        'email' => $faker->unique()->safeEmail,
        'telefone_1' => $faker->numerify('(##) #####-####'),
        'telefone_2' => $faker->numerify('(##) #####-####'),
        'telefone_1_wp' => $faker->numberBetween(0,1),
        'telefone_2_wp' => $faker->numberBetween(0,1),
        'cep' => $faker->numerify('#####-###'),
        'rua' => $faker->streetName,
        'numero' => $faker->numberBetween(0001,9999),
        'bairro' => $faker->name,
        'cidade' => $faker->city,
        'estado' => $faker->city,
        'pais' => $faker->country,
        'complemento' => 'Sem complemento'
    ];
});
