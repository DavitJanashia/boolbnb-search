<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
      'city'  => $faker -> city(),
      'lat'   => $faker -> latitude($min = -90, $max = 90),
      'lng'   => $faker -> longitude($min = -180, $max = 180),
    ];
});
