<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Modelo;
use Faker\Generator as Faker;

$factory->define(Modelo::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));

    return [
        'descricao' => $faker->vehicleModel
    ];
});
