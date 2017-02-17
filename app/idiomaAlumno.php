<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class idiomaAlumno extends Model
{   
     protected $table = "alumnosidiomas";
    protected $fillable = ['email','idioma','nivel'];
    
    public function Idioma(){

              return  $this->hasOne('\Bolsa\Idioma','id','idioma');

        }
}
