<?php

use Faker\Generator as Faker;
$factory->define(App\Models\NazarPro::class, function (Faker $faker) {
    return [
        
        'name' => $faker->name,
        'nazar' => $faker->text,
        'date' =>$faker->date,
        'like' => 10, // secret
        'unlike' => 7, // secret
        'show' => 1,
    ];
});
