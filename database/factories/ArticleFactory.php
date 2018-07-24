<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'content' => $faker->realText($maxNbChars = 800, $indexSize = 2),
        'author' => App\User::all()->random()->name,
 		'idSection' => App\Section::all()->random()->id,
    ];
});
