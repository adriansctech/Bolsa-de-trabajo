<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Alumno extends Model
{

	protected $primaryKey = 'email';
    protected $keyType = 'string';
    protected $fillable = ['email', 'nombre', 'apellidos','domicilio','tlf','trabajofuera','cvlinkedin','foto','valido'];

        public function Ciclos(){

            
                  return  $this->hasMany('\Bolsa\cicloAlumno','alumno','email');
    }
        public function Idiomas(){

            
                  return  $this->hasMany('\Bolsa\idiomaAlumno','email','email');
    }

}
