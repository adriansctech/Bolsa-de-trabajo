<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Alumno extends Model
{
    protected $fillable = ['mail', 'nombre', 'apellidos','domicilio','poblacion','trabajofuera','cvlinkedin','foto','valido','informacion'];
}
