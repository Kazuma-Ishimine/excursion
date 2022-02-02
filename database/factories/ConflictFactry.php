<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Conflict;
use Faker\Generator as Faker;

$factory->define(Conflict::class, function (Faker $faker) {
    return [
        // name
        'name' => $faker->word,
        // image
        'image' => $faker->ImageUrl($width=100, $height=100),
        // service_id
        'service_id' => $faker->randomDigitNotNull(10),
    ];
});
