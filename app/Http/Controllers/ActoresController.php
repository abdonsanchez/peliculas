<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;

class ActoresController extends Controller
{
    public function listado () {
      // $actores = Actor::all();
      // estamos haciendo una paginacion de resultados
      $actores = Actor::paginate(5);

      $vac = compact("actores");

      return view("listadoActores", $vac);
    }

     // funciones mias
    public function prueba() {
      $actores = Actor::all();
      $puteadita = "la concha que lo pario";
      // $actores[] = "basilon";
      $vac = compact("actores","puteadita");
      return view("prueba",$vac);
      }

      public function colores(){
        $colores = ["amarillo","rojo","azul","negro"];
        $vac = compact("colores");
        return view("listadoActores",$vac);
      }

}
