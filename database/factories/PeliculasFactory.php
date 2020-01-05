<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pelicula;
use Faker\Generator as Faker;

// atravez de Eloquent traemos todos los generos, y podemos agarrar uno al azar y obtener un id, de esta manera no solo tendriamos datos fijos sino relaciones entre las tablas
$generos = \Genero::all();


$factory->define(Pelicula::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence(6),
        "release_date" => $faker->date(),
        "rating" => $faker->randomDigit(),
        "awards" => $faker->numberBetween(0, 25),
        // vamos a querer un numero al azar de los generos ya existentes
        "genre_id" => 
    ];
});
