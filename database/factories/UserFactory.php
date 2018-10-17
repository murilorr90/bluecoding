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

$factory->define(App\Models\User::class, function (Faker $faker) {
    $first_name = $faker->firstName;
    $last_name = $faker->lastName;
    return [
        'name' => $first_name . ' ' . $last_name,
        'email' => $faker->unique()->safeEmail,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'is_host' => $faker->boolean,
        'date_of_birth' => $faker->date('Y-m-d')
    ];
});
