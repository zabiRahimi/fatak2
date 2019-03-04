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

// $factory->define(App\Models\Pro::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'dis' => $faker->text,
//         'price' =>rand(10000, 99999),
//         'pic' => '214192.jpg', // secret
//         'show' => 1,
//     ];
// });
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
