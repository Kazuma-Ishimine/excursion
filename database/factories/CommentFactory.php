<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        // body
        'body' => $faker->text($maxNbChars = 100),
        // user_id
        'user_id' => $faker->randomDigitNotNull(10),
        // service_id
        'service_id' => $faker->randomDigitNotNull(10),
    ];
});
