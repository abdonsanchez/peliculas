<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    public $table = "movies";
    public $primarykey = "id";
    public $timestamps = false;
    public $guarded = [];
}
