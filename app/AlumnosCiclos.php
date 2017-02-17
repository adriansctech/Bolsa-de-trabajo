<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class AlumnosCiclos extends Model
{
    protected $fillable = ['ciclo', 'alumno', 'finicio', 'ffin', 'nota'];
}