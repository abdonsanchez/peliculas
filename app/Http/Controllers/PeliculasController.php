<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Le estoy diciendo que voy a hablar en este controlador de datos de tipo pelicula
use App\Pelicula;

class PeliculasController extends Controller
{

  public function listado () {

  // $peliculas =[
  //   0 => [
  //   "nombre" => "Buscando a Nemo",
  //   "rating" => 8.5,
  //   ],
  //   1 => [
  //     "nombre" => "Toy Story",
  //     "rating" => 7.2,
  //   ],
  //   2 => [
  //     "nombre" => "Toy Story 2",
  //     "rating" => 5.8
  //   ]
  //
  // ];

      // usando el orm Eloquent reemplazamos la sintaxis el codigo de arriba por el siguiente
      $peliculas = Pelicula::all();
      
      $vac = compact("peliculas");
      return view("listadoPeliculas", $vac);
  }

  public function detalle ($id){
    $vac = compact("id");
    return view("detallePelicula", $vac);
  }

}
