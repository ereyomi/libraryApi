<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

//use App\Model;
use App\Book;
use App\User;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),        
        'status' => $faker->randomElement([Book::AVAILABLE, Book::NOT_AVAILABLE]),
        'isbn' => Str::random(10),
        'cover' => $faker->randomElement(['a.jpeg', 'b.jpeg']),
        'user_id'=> User::all()->random()->id,
        'college_id'=> $faker->randomElement([1, 2]),
        'rating'=> $faker->randomElement([1, 2, 3, 4, 5]),
    ];
});
