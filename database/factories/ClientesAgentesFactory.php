<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ClienteAgente::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'foto' => $faker->hexColor,
        'data_nascimento' =>  $faker->date('Y-m-d'),
        'cpf' => $faker->numerify('###.###.###-##'),
        'email' => $faker->unique()->safeEmail,
        'telefone_1' => $faker->numerify('(##) #####-####'),
        'telefone_2' => $faker->numerify('(##) #####-####'),
        'cep' => $faker->numerify('#####-###'),
        'rua' => $faker->numberBetween(1,100000),
        'numero' => $faker->streetName,
        'bairro' => $faker->name,
        'cidade' => $faker->city,
        'estado' => $faker->state,
        'profissao' => $faker->jobTitle,
        'hobbies' => $faker->jobTitle,
        'sobre' => $faker->realText(200, 2),
        'receber_informacoes' => $faker->numberBetween(0,1),
        'corretoras_id' => $faker->numberBetween(1,5)
    ];
});