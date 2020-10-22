<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Filial::class, function (Faker $faker) {
    return [
        'nome' => $faker->randomAscii,
        'numero' => $faker->numberBetween(),
        'rua' => $faker->randomAscii,
        'bairro' => $faker->randomAscii,
        'complemento' => $faker->randomAscii,
        'cidade' => $faker->randomAscii,
        'uf' => $faker->randomAscii,
        'cep' => $faker->randomAscii,
        'cnpj' => $faker->randomAscii,
        'inscricao_estadual' => $faker->randomAscii
    ];
});
