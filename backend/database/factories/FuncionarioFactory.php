<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Funcionario;
use App\Models\Cargo;
use App\Models\Filial;
use Faker\Generator as Faker;

$factory->define(Funcionario::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));

    return [
        'nome' => $faker->firstName,
        'data_aniversario' => $faker->date(),
        'sexo' => $faker->randomElement(['M', 'F']),
        'numero' => $faker->numberBetween(1, 1000),
        'rua' => $faker->streetName,
        'bairro' => $faker->state,
        'complemento' => $faker->randomElement(['Casa', 'Apartamento']),
        'cidade' => $faker->city,
        'uf' => $faker->stateAbbr,
        'cep' => $faker->randomNumber(8),
        'cpf' => $faker->unique()->cpf(false),
        'salario' => $faker->randomDigit,
        'status' => $faker->boolean,
        'senha' => '123456',
        'cargo_id' => factory(Cargo::class)->create()->id,
        'filial_id' => factory(Filial::class)->create()->id
    ];
});
