<?php

use Faker\Generator as Faker;

$factory->define(App\Contactos::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->realText(rand(20, 40)),
        'cell_phone' => $faker->realText(11),
    ];
});
