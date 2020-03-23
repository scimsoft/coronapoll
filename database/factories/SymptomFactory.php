<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Symptom;
use Faker\Generator as Faker;

$factory->define(Symptom::class, function (Faker $faker) {
    return [
        //
        'ip' => $faker->ipv4,

        'latitude' => $faker->latitude(37.365,37.406),
        'longitude' => $faker->longitude(-6.019,-5.905),
        'location' => rand(1,8),
        'temp' => rand(26,41),
        'cough' => rand(1,5),
        'musclePain' => rand(1,5),
        'breathShortness' => rand(1,5),
    ];
});
