<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ShopInformation;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(ShopInformation::class, function (Faker $faker) {
    return [
        'shopName' => $faker->name,
        'shopSerialId' => 1,
        'shopUserName' => $faker->name,
        'password' => 12345,
        'lastLoginIp' => 12345,
        'referType' => 12345,
        'referUserId' => 12345,
        'shopTypeId' => 1,
        'shopStatus' => 1,
        'created_at' => Carbon::now(),
    ];
});
