<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Advert;
use App\User;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Advert::class, function (Faker $faker) {
    $users = User::all()->count();
    $categories = Category::all()->count();
    return [
        'user_id' => $faker->numberBetween(1, $users),
        'category_id' => $faker->numberBetween(1, $categories),
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph,
        'price' => $faker->randomFloat(2, 10, 100),
        'negotiation' => $faker->boolean
    ];
});
