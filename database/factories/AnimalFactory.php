<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Animal;
use Faker\Generator as Faker;

$factory->define(Animal::class, function (Faker $faker) {
    return [

        'id_number' => $faker->numberBetween(1, 999999),
        'identification_number' => $faker->numberBetween(1, 9999),
        'hb' => $faker->word,
        'rb' => $faker->word,
    
    ];
});
