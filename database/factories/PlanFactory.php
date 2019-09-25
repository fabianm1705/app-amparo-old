<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Group;

$factory->define(App\Models\Plan::class, function (Faker $faker) {
    $count = Group::count();

    return [
      'nroAdh' => $faker->numberBetween(0,10),
      'nombre' => $faker->randomElement($array = array ('Sepelio','Salud','Odontología')),
      'monto' => $faker->numberBetween(120,500),
      'group_id' => $faker->numberBetween(1,$count)
    ];
});
