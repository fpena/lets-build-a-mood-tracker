<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MoodUpdate;
use Faker\Generator as Faker;

$factory->define('App\MoodUpdate', function (Faker $faker) {
    return [
        'mood' => $faker->numberBetween(1, 5),
        'journal' => $faker->sentence,
        'user_id' => create(\App\User::class),
        'created_at' => $faker->unique()->dateTimeBetween('-2 weeks', '-1 week')
    ];
});
