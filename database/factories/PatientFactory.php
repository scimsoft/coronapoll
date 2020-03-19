<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(App\Patient::class, function (Faker $faker) {
    return [
        //
        'status' => rand(0,6),
    ];
});
