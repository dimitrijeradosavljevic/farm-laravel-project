<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Birth;
use Faker\Generator as Faker;

$factory->define(Birth::class, function (Faker $faker) {
    return [
        'date' => $faker->date,
        'birth_number' => $faker->numberBetween(1, 20),
        'males' => $faker->numberBetween(1, 3),
        'females' => $faker->numberBetween(1, 3),
        'passed' => $faker->numberBetween(0, 5),
        'mummified' => $faker->numberBetween(0, 2),
        'animal_id' => $faker->numberBetween(1, 10)

    ];
});
