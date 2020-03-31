<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {

  return [
    'user_id' => 1,
    'status' => $faker->boolean(75),
    'name' => $faker->sentence(3),
    'start_date' => $faker->dateTimeBetween('-1 year', '-5 months'),
    'end_date' => $faker->dateTimeBetween('-2 months', 'now')
  ];
});
