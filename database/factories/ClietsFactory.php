<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Crypt;

$factory->define(Client::class, function (Faker $faker) {
    
    return [
        'name' => Crypt::encryptString($faker->name),
        'cpf' => Crypt::encryptString($faker->numberBetween($min = 400000, $max = 500000)),
        'rg' => Crypt::encryptString($faker->numberBetween($min = 600000, $max = 7000000)),
    ];
});
