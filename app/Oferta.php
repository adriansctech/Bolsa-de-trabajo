<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Oferta extends Model
{
    protected $fillable = ['id', 'puesto', 'contrato','valido','descripcion','empresa_cif','responsable'];
}
