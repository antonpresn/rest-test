<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'secondname' => $faker->lastName,
        'book_id' => function () {
        	return factory(App\Book::class)->create()->toArray()['id'];
        },
    ];
});
