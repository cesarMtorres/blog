<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweet;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence,
        'content' => $faker->text,
        'user_id' => 1
    ];
});
