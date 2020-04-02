<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\MoodUpdate::class, function (Faker $faker) {
    return [
        'mood' => $faker->numberBetween(1, 5),
        'journal' => $faker->sentence,
        'user_id' => factory(\App\User::class)->create(),
        'created_at' => $faker->unique()->dateTimeBetween('-2 weeks', '-1 week')
    ];
});
