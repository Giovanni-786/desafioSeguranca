<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Crypt;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'nome' => Crypt::encryptString($faker->name),
        'estoque' => Crypt::encryptString($faker->numberBetween($min = 4000, $max = 5000)),
        'preco_custo' => Crypt::encryptString($faker->numberBetween($min = 200, $max = 300)),
        'preco_venda' => Crypt::encryptString($faker->numberBetween($min = 350, $max = 500)),
    ];
});
