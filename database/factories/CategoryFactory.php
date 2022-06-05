<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\User;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name,
        'user_id' => $this->faker->numberBetween(1, User::count()),
    ];
});
