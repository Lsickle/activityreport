<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Time;
use Faker\Generator as Faker;

$factory->define(Time::class, function (Faker $faker) {
    return [
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'), // '1979-06-09',
        'time' => 2
    ];
});
