<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Box::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(100),
        'weight' => $faker->randomFloat(2, 0, 10000),
        'color' => $faker->hexColor,
        'destination' => $faker->randomElement(['sweden', 'china', 'brazil', 'australia']),
    ];
});
