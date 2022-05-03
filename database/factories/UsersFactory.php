<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Crypt;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => Crypt::encryptString($faker->name),
        'email' => Crypt::encryptString($faker->email),
        'password' => Crypt::encryptString($faker->password),
    ];
});
