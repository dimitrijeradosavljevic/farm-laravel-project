<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exclusion;
use Faker\Generator as Faker;

$factory->define(Exclusion::class, function (Faker $faker) {
    return [
        'date' => $faker->date(),
        'days_old' => $faker->numberBetween(70, 120),
        'animals_count' => $faker->numberBetween(7, 16),
        'litter_weight' => $faker->numberBetween(150, 300),
        'litter_mark' => $faker->numberBetween(5, 10),
        'mother_mark' => $faker->numberBetween(5, 10),
        'males_for_breeding' => $faker->numberBetween(5, 8),
        'females_for_breeding' => $faker->numberBetween(5, 8),
        'birth_id' => $faker->randomDigit,
    ];
});
