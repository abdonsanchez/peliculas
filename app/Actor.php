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
}
