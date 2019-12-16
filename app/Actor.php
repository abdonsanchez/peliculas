<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public $table = "actors";
    public $primarykey = "id";
    public $timestamps = null;
    public $guarded = [];

    public function getNombreCompleto () {
      return $this->first_name." ".$this->last_name;
    }

    public function peliculas() {
      // esta funcion recibe 4 parametros; que tipo de objeto devuelve, como se llama la tabla intermedia y en tercer y cuarto lugar el nombre de las claves foraneas, el orden es primero el nombre de la columna que haga referencia al modelo donde estamos parados
      return $this->belongsToMany("App\Pelicula", "actor_movie", "actor_id", "movie_id");
    }
}
