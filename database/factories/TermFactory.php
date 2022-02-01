<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Term;
use Faker\Generator as Faker;

$factory->define(Term::class, function (Faker $faker) {
    return [
        // service_id
        'service_id' => $faker->randomDigitNotnull(10),
        // name
        'name' => $faker->word,
        // mean
        'mean' => $faker->text($maxNbChars=100),
    ];
});
