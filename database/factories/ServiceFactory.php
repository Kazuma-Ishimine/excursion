<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        // name
        'name' => $faker->word,
        // company_id
        'company_id' => $faker->randomDigitNotnull(10),
        // body
        'body' => $faker->text($maxNbChars = 200),
        // charge
        'charge' => $faker->text($maxNbChars = 200),
    ];
});
