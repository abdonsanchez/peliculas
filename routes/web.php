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

// las rutas se crean con una clase ya definida de laravel llamada Route::
Route::get("/inicio", function () {
    return "Hola, bienvenidos a mi inicio";
});

Route::post("/borrarPelicula","PeliculasController@borrar");

Route::get("/actores", "ActoresController@listado");

Route::get("/peliculas", "PeliculasController@listado");

Route::get("/pelicula/{id}", "PeliculasController@detalle");

Route::get("/actor/top", "PeliculasController@top");

Route::get("/agregarPelicula", function (){
  return view("agregarPelicula");
});

Route::post("/agregarPelicula", "PeliculasController@agregar");

Route::get("/saludar/{nombre}/{apellido?}", function($nombre,$apellido="Sin apellido"){
  return "Bienvenido $nombre $apellido";
});

// rutas mias
Route::get("/generos", "GenerosController@genero");

Route::get("/putear", "PeliculasController@putear");

Route::get("/sumar/{num1}/{num2}", "PeliculasController@sumar");

Route::get("/restar/{num1}/{num2}", "PeliculasController@restar");

Route::get("/multiplicar/{num1}/{num2}", function($num1, $num2){
  $resultado = $num1*$num2;
  $felicitaciones = "En hora buena";
   $vac = compact("num1","num2","resultado","felicitaciones");
    return view("multiplicar",$vac);
});

Route::get("/petisita", function(){
  return "Sos linda";
});

// Route::get("/sum/{num1}/{num2}", "Pelicula.php@sum");

Route::get("/enamorado/{num1}/{num2}", "PeliculasController@enamorado");

// Route::get("/actores","ActoresController@colores");
Route::get("/prueba", "ActoresController@prueba");








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
