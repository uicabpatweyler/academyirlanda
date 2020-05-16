<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'display_name' => $faker->lastName,
        'description' => $faker->company,
        'guard_name' => 'web'
    ];
});
