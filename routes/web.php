<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get("/", function () {
//   return view("bienvenido");
// });

Route::get("/inicio", function () {
    return "Hola, bienvenidos a mi inicio";
});

Route::get("/peliculas", function () {

$peliculas =[
  0 => [
  "nombre" => "Buscando a Nemo",
  "rating" => 8.5,
  ],
  1 => [
    "nombre" => "Toy Story",
    "rating" => 7.2,
  ],
  2 => [
    "nombre" => "Toy Story 2",
    "rating" => 5.8
  ]

];
    $vac = compact("peliculas");
    return view("listadoPeliculas", $vac);
});

Route::get("/pelicula/{id}", function($id){
  $vac = compact("id");
  return view("detallePelicula", $vac);
});

Route::get("/saludar/{nombre}/{apellido?}", function($nombre,$apellido="Sin apellido"){
  return "Bienvenido $nombre $apellido";
});
