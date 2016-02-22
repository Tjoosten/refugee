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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->name,
        'email'     => $faker->email,
        'api_token' => str_random(60),
        'status'    => $faker->numberBetween(0, 1),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Trips::class, function(Faker\Generator $faker) {
    return [
        'user_id' => 4,
    ];
});

$factory->define(App\Points::class, function(Faker\Generator $faker) {
    return [
        'adress'  => $faker->address,
        'contact' => $faker->email,
        'naam_inzamelpunt'  => $faker->words(),
        'Opening_maandag'   => $faker->words(),
        'Opening_dinsdag'   => $faker->words(),
        'Opening_woensdag'  => $faker->words(),
        'Opening_donderdag' => $faker->words(),
        'Opening_vrijdag'   => $faker->words(),
        'Opening_zaterdag'  => $faker->words(),
        'Opening_zondag'    => $faker->words(),

    ];
});