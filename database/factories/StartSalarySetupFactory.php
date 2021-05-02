<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StartSalarySetup;
use Faker\Generator as Faker;

$factory->define(StartSalarySetup::class, function (Faker $faker) {
    return [
        'employeEntryId'=> rand(1,6),
        'jobDepartmentId'=> rand(3,7),
        'gradeEntryId'=> rand(1,6),
        'startDate'=> $faker->dateTime,
        'monthDate'=> rand(1,12),
        'salarySetupStatus'=> rand(1,2),
        'paymentStatus'=> rand(0,1),
        'shopId'=> 1,
        'shopTypeId'=> 1,
        'createBy'=> 3,
    ];
});
