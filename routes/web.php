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

Route::get("actores", "ActoresController@listado");

Route::get("/inicio", function () {
    return "Hola, bienvenidos a mi inicio";
});

Route::get("/peliculas", "PeliculasController@listado");

Route::get("/pelicula/{id}", "PeliculasController@detalle");

Route::get("/actor/top", "PeliculasController@top");

Route::get("/saludar/{nombre}/{apellido?}", function($nombre,$apellido="Sin apellido"){
  return "Bienvenido $nombre $apellido";
});

Route::get("/agregarPelicula", function (){
  return view("agregarPelicula");
});

Route::post("/agregarPelicula", "PeliculasController@agregar");
