<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

//use App\Model;
use App\College;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(College::class, function (Faker $faker) {
    return [
        'college' => $faker->randomElement(['Science', 'Engineering']),
    ];
});
