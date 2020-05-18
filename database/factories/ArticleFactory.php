<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [

        'title' => $faker->title,
        'description' => $faker->sentence,
        'body' => $faker->text(500),
        'user_id' => 1 ,




    ];
});
