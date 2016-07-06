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

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(App\Events::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'location' => $faker->company,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => "TX",
        'zip' => $faker->postcode,
        'start' => $faker->date('Y-m-d H:i:s'),
        'end' => $faker->date('Y-m-d H:i:s')
    ];
});
