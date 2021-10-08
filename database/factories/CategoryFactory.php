<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    $word = $faker->word;
    return [
        'name' => ucfirst($word),
        'slug' => \Str::slug($word)
    ];
});
