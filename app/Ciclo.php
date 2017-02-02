<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Ciclo extends Model
{
    protected $fillable = ['ciclos', 'responsable', 'departamento'];
}
