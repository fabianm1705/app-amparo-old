<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
      'modelo' => $faker->firstname,
      'categoria' => $faker->randomElement($array = array ('Celulares','Electrodomésticos')),
      'descripcion' => $faker->text($maxNbChars = 100),
      'montoCuota' => $faker->numberBetween(1200,2900),
      'cantidadCuotas' => 6,
      'vigente' => true
    ];
});
