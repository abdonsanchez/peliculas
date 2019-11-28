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
    return "listado de peliculas";
});
// 
// Route::get("/pelicula/{id}", function($id){
//   return "Me pidieron la pelicula $id";
// });
//
// Route::get("/saludar/{nombre}/{apellido?}", function($nombre,$apellido="Sin apellido"){
//   return "Bienvenido $nombre $apellido";
// });
