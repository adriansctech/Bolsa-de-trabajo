<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class AlumnosCiclos extends Model
{
	protected $table = "ciclosalumnos";
    protected $fillable = ['ciclo', 'alumno', 'finicio', 'ffin', 'nota', 'empresa'];
    public function Ciclo(){

              return  $this->hasOne('\Bolsa\Ciclo','id','ciclo');

        }
}