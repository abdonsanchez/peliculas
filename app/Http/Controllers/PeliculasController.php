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
    // $vac = compact("id");

    // return view("detallePelicula", $vac);

// la funcion find (metodo de eloquent) toma los datos que especificamos en el modelo de pelicula y hace un
// SELECT * FROM movies WHERE id = $id
    $pelicula = Pelicula::find($id);
    $vac = compact("pelicula");
    return view("detallePelicula", $vac);
  }

  public function top (){
    $peliculas = Pelicula::where("rating",">",5)->orderBy("title")->get();
    $vac = compact("peliculas");
    return view("listadoPeliculas", $vac);
  }
  // esta funcion va a trabajar con un formulario para esto estamos obligados en la funcion controladora a recibir un objeto de tipo Request, de esta manera nuestra variable de tipo Request va a obtener todos los datos del formulario haciendo que ya no tengamos que trabajar con $get y con $post donde laravel automaticamente a agregado una capa de seguridad.
  public function agregar (Request $req) {

    $peliculaNueva = new Pelicula();

    // con esto traemos los campos del formulario y lo llevamos (guardamos) a la base de datos a travez de la variable $peliculaNueva, laravel ya sabe que los objetos de tipo Peliculas estan asociados con la tabla movies.
    $peliculaNueva->title = $req["title"];
    $peliculaNueva->rating = $req["rating"];
    $peliculaNueva->awards = $req["awards"];
    $peliculaNueva->release_date = $req["release_date"];

    // lo guardamos con el metodo save, con esto laravel hace el insert a la base de datos y si a existe laravel hace un update
    $peliculaNueva->save();

    // en vez de devolver una vista devolvemos una redireccion a la ruta /Peliculas
    return redirect("/peliculas");
  }

}
