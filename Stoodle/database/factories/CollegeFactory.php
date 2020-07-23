<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\College;
use Faker\Generator as Faker;

$factory->define(College::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
        'image' => 'images/Rq3pk7SMm5g0WsSOl6SKfXjocM4LS6NtYoV6aV16.jpeg',
        'admittance' => 1,
        'job' => 1,
        'social' => 1,
        'stress' => 1,
        'sport' => 1,
        'university_id' => 2,
        'county_id' => 1,
        'profil_id' => 8,
        'passion_id' => 27,
        'book_id' => 2,
        'subject_id_1' => 19,
        'subject_id_2' => 3,
        'subject_id_3' => 20,
        'description' => $faker->paragraph,
        'url'=> 'https//www.google.com',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
