<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genero;

class GenerosController extends Controller
{
  public function genero () {
      $generos = Genero::all();

      $vac = compact("generos");
      return view("listadoGeneros", $vac);
  }
}
