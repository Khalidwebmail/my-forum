<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Question::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => ucfirst($title),
        'slug' => \Str::slug($title),
        'body' => $faker->text,
        'category_id' => \App\Category::all()->random()->id,
        'user_id' => \App\User::all()->random()->id,
    ];
});
