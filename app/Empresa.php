<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{
    protected $fillable = ['email', 'cif', 'nombre','actividad','domicilio','poblacion','tlf','web','nombreContacto','cargoContacto','tlfContacto','emailContacto','logo'];
}
