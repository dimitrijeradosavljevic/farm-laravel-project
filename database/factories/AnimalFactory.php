<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Animal;
use Faker\Generator as Faker;

$factory->define(Animal::class, function (Faker $faker) {
    return [

        'id_number' => $faker->randomNumber(6),
        'gender' => $faker->boolean,
        'identification_number' => $faker->randomNumber(6),
        'hb' => $faker->word,
        'rb' => $faker->word,
        'birth_day' => $faker->date,
        'breed_id' => $faker->numberBetween(1, 5),
        'user_id' => 1,
        'owner_id' => $faker->numberBetween(1, 3),
        'exclusion_date' => $faker->date,
        'exclusion_reason' => $faker->sentence(1),
        'days_in_first_mating' => $faker->randomNumber(2),
        'left_tits' => $faker -> numberBetween(1, 7),
        'right_tits' => $faker -> numberBetween(1, 7),
        'selection_mark' => $faker->randomNumber(6),
        'registration_number' => $faker->randomNumber(6),
    	'tattoo_number' => $faker->randomNumber(6),
    	'birth_type' => $faker->sentence(1)
    ];
});
