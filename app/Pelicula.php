<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    public $table = "movies";
    public $primarykey = "id";
    public $timestamps = false;
    public $guarded = [];

// definimos la relacion en el modelo y atravez de un metodo vamos a decir es que tiene una relacion para obtener el genero de la pelicula, el metodo belongsTo permite decir que una pelicula pertenece a un genero, recibe dos parametros el primero que tipo de cosa devuelve y el segundo parametro es la clave foranea que es donde se plasma la relacion, dentro de la tabla pelicula tenemos una columna llamada genre_id
    public function genero() {
      return $this->belongsTo("App\Genero","genre_id");
    }

    public function actores() {
      return $this->belongsToMany("App\Actor", "actor_movie", "movie_id", "actor_id");
    }
}
