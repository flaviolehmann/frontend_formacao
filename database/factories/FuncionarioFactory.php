<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Funcionario;
use Faker\Generator as Faker;

$factory->define(Funcionario::class, function (Faker $faker) {
    return [
        'nome' => $faker->randomAscii,
        'data_aniversario' => $faker->date(),
        'sexo' => $faker->randomAscii,
        'numero' => $faker->numberBetween(),
        'rua' => $faker->randomAscii,
        'bairro' => $faker->randomAscii,
        'complemento' => $faker->randomAscii,
        'cidade' => $faker->randomAscii,
        'uf' => $faker->randomAscii,
        'cep' => $faker->randomAscii,
        'cpf' => $faker->randomAscii,
        'inscricao_estadual' => $faker->randomAscii,
        'salario' => $faker->randomDigit,
        'status' => $faker->boolean,
        'senha' => $faker->randomAscii,
        'cargo_id' => 1,
        'filial_id' => 1
    ];
});
