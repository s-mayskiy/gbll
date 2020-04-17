<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
//use Faker\Generator as Faker;
use App\Categories;


$factory->define(News::class, function ($faker) {


    $faker = \Faker\Factory::create('ru_RU');


    $categoriesCount = Categories::query()->get()->count();

    return [
        'title' => $faker->realText(rand(20,50)),
        'text' => $faker->realText(rand(1000,3000)),
        'categoryId' => rand(1,$categoriesCount),
        'premium' => 0,
    ];
});

