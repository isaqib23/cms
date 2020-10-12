<?php

/** @var Factory $factory */

use App\Article;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => substr($faker->sentence(2), 0, -1),
    ];
});
