<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'desc' => $faker->text,
        'user_id' => factory(App\User::class)->create()
    ];
});
