<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\season;
use Faker\Generator as Faker;

$factory->define(season::class, function (Faker $faker) {
    return [
        'name' => 'season'.count(season::all()),
    ];
});
