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
}
