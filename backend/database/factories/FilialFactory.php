<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Filial::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\pt_BR\Company($faker));

    return [
        'nome' => $faker->company,
        'numero' => $faker->numberBetween(1, 2000),
        'rua' => $faker->streetName,
        'bairro' => $faker->state,
        'complemento' => $faker->randomElement(['Casa', 'Apartamento']),
        'cidade' => $faker->city,
        'uf' => $faker->stateAbbr,
        'cep' => $faker->randomNumber(8),
        'cnpj' => $faker->unique()->cnpj(false),
        'inscricao_estadual' => $faker->unique()->randomNumber(6, false)
    ];
});
