<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        // name
        'name' => $faker->name,
        // industry_id
        'industry_id' => $faker->randomDigitNotNull(10),
        // image
        'image' => $faker->ImageUrl($width=100, $height=100),
    ];
});
