<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => $this->faker->numberBetween(1, Category::count()),
        'title' => $this->faker->sentence,
        'desc' => $this->faker->text(100),
        'content' => $this->faker->paragraph,
        'author' => $this->faker->name,
    ];
});
