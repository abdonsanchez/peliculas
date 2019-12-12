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

// el formato de $reglas es: del lado izquierdo vamos a poner los campos del formulario que queremos validar, vamos a tener que utilizar el mismo name que pusimos en el imput del formulario.
// del lado derecho laravel nos da un conjunto de reglas standar de validacion, todas las reglas disponibles la tenemos en la documentacion de laravel.
    $reglas = [
// para pedir que el titulo sea unico en la db, aclaramos que sea unico en la tabla de peliculas en la columna de titulo.
      "title" => "string|min:3|unique:movies,title",
      "awards" => "integer|min:0",
      "release_date" => "date",
      "rating" => "numeric|min:0|max:10",
      "poster" => "file",
    ];
// los mensajes de error son una aclaracion para cada una de las reglas que hallamos utilizado
    $mensajes = [
      // :attribute se va a rellenar con el campo de error
      "string" => "El campo :attribute debe ser un texto",
      // :min se va a reemplazar por el numero que hallamos configurado en la regla de validacion
      "min" => "El campo :attribute tiene un minimo de :min",
      "max" => "El campo :attribute tiene un maximo de :max",
      "date" => "El campo :attribute debe ser una fecha",
      "numeric" => "El campo :attribute debe ser un numero",
      "integer" => "El campo :attribute debe ser un numero entero",
      "unique" => "El campo :attribute se encuentra repetido",
    ];

    // agregamos la validacion atravez de validate() un metodo que se puede utilizar en cualquier funcion dentro de un controlador. validate() recibe 3 cosas, el formulario a validar, las reglas con lo que lo queremos validar y los mensajes de error en caso de falla
    $this->validate($req, $reglas, $mensajes);

    $peliculaNueva = new Pelicula();

    // guardamos la imagen, en la variable $req tenemos todo el formulario enviado y para obtener la imagen subida utilizamos el metodo file con el nombre del archivo que se acaba de subir (poster) una vez obtenido para almacenarlo utilizamos el metodo store() y diciendo en que carpeta dentro de storage lo queremos almacenar "public" siempre que tengamos archivos subidos que queremos mostrar en el frontend estamos obligados a escribir "public".
    // sin embargo este archivo devuelve la ruta entera donde se va a guardar el archivo incluyendo el nombre final.
    $ruta = $req->file("poster")->store("public");

    // a nosotros solo nos interesa el nombre del archivo, para eso utilizamos la funcion de php y no de "laravel" basename() que va a recortar la ruta y nos va a dar unicamente el nombre del archivo
    $nombreArchivo =  basename("$ruta");

    // una vez que ya recortamos el nombre, a la pelicula nueva que estamos por almacenar en la base de datos vamos a guardar en la columna poster el nombre del archivo.
    $peliculaNueva->poster = $nombreArchivo;

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

  public function borrar(Request $formulario){
    $id = $formulario["id"];
    $pelicula = Pelicula::find($id);

    $pelicula->delete();

    return redirect("/peliculas");
  }

}
