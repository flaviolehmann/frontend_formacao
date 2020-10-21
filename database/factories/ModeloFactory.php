<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Modelo;
use Faker\Generator as Faker;

$factory->define(Modelo::class, function (Faker $faker) {
    return [
        'descricao' => $faker->name
    ];
});
