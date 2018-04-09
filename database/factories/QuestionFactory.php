<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Question::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
        'a' => $faker->address,
        'b' => $faker->address,
        'c' => $faker->address,
        'd' => $faker->address,
        'correct_answer' => 'a',
        'level' => $faker->numberBetween(1, 5),
    ];
});
