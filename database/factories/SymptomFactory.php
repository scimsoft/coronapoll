<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Symptom;
use Faker\Generator as Faker;

$factory->define(Symptom::class, function (Faker $faker) {
    return [
        //
        'ip' => $faker->ipv4,
        'coX' => $faker->latitude,
        'coY' => $faker->longitude,
        'location' => rand(1,8),
        'temp' => rand(26,41),
        'caugh' => rand(1,5),
        'musclePain' => rand(1,5),
        'breathShortness' => rand(1,5),
    ];
});
