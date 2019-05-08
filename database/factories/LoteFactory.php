<?php

use Faker\Generator as Faker;


$factory->define(App\Lote::class, function (Faker $faker) {
    return [
      'strain_id' => App\models\Strain::inRandomOrder()->first()->id,
      'quntity' => $fake->numberBetween($min = 100, $max = 300),
      'price' => 5000,
      'consumed' => 0,
    ];
});
