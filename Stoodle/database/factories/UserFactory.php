<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'admin' => 0,
        'job' => NULL,
        'passion_intensity' => NULL,
        'social' => NULL,
        'stress' => NULL,
        'sport' => NULL,
        'county_id' => NULL,
        'profil_id' => NULL,
        'passion_id' => NULL,
        'book_id' => NULL,
        'subject_id_1' => NULL,
        'subject_id_2' => NULL,
        'subject_id_3' => NULL,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
