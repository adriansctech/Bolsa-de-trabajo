<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class cicloAlumno extends Model
{
    protected $table = "ciclosalumnos";
    protected $fillable = ['ciclo', 'alumno', 'finicio', 'ffin'];
    
    public function Ciclo(){

              return  $this->hasOne('\Bolsa\Ciclo','id','ciclo');

        }

}

