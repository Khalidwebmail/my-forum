<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Reply::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'question_id' =>\App\Question::all()->random()->id,
        'user_id' => \App\User::all()->random()->id,
    ];
});
