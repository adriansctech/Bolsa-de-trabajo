<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Alumno extends Model
{
    protected $fillable = ['email', 'nombre', 'apellidos','domicilio','tlf','poblacion','trabajofuera','cvlinkedin','foto','valido'];

}
