<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'question_id' =>Question::all()->random()->id,
        'user_id' => Question::all()->random()->id,
    ];
});
