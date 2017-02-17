<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Alumno extends Model
{
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    protected $fillable = ['email', 'nombre', 'apellidos','domicilio','tlf','poblacion','trabajofuera','cvlinkedin','foto','valido'];

}
