<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SalesCustomerEntry;
use Faker\Generator as Faker;

$factory->define(SalesCustomerEntry::class, function (Faker $faker) {
    return [
        'customerTypeId' => rand(1,3),
        'customerName' => $faker->name,
        'customerEmail' => $faker->unique()->safeEmail,
        'customerPhone' => rand(0,11),
        'customerAddress' => $faker->name,
        'customerStatus' => 1,
        'shopId' => 1,
        'shopTypeId' => 1,
        'createBy' => 3,
    ];
});
