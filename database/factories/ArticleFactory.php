<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use App\Models\Category;
use App\User;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => 'Task 5 Fullstack',
        'content' => 'Task content',
        'image' => 'Task image.png',
        'user_id' => $this->faker->numberBetween(1, User::count()),
        'category_id' => $this->faker->numberBetween(1, Category::count()),
    ];
});
