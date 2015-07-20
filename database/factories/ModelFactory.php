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

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\GameData::class, function($faker){
   return [
    'name'=>$faker->name,
    'numPass' =>str_random(10),
    'numLive' =>$faker->randomNumber(1),
    'allDegreeAngle' => $faker->randomFloat(2,0,100),
    'distanceHead' => $faker->randomFloat(2,0,100),
    'degreeSed' => $faker->randomFloat(2,0,100),
    'averageVelocity' => $faker->randomFloat(2,0,100),
    'hash' => str_random(256),
    'score' => $faker->numberBetween(0,1200000),
    'avoid' => $faker->randomFloat(2,0,100),
    'speed' => $faker->randomFloat(2,0,100),
    'time' => $faker->randomFloat(2,0,100),
    'distance' => $faker->randomFloat(2,0,100),
    'calories' => $faker->randomFloat(2,0,100),
    'create_date' => $faker->dateTimeThisMonth('now'),
   ];
});
