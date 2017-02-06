<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Ciclo extends Model
{
    protected $fillable = ['id', 'ciclo', 'responsable', 'departamento'];
}
