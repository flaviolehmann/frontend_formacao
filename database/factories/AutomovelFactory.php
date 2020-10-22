<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Automovel;
use App\Models\Modelo;
use App\Models\Categoria;
use App\Models\Filial;
use Faker\Generator as Faker;

$factory->define(Automovel::class, function (Faker $faker) {
    return [
        "nome" => $faker->name,
        "ano" => $faker->year,
        "cor" => $faker->colorName,
        "nr_chassi" => $faker->randomNumber,
        "modelo_id" =>  factory(Modelo::class)->create()->id,
        "categoria_id" =>  factory(Categoria::class)->create()->id,
        "filial_id" =>  factory(Filial::class)->create()->id
    ];
});
