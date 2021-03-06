<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Models\Admin\Permission::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->word,
    ];
});
