<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{
    protected $fillable = ['mail', 'cif', 'nombre','actividad','domicilio','poblacion','telf','web','contactonombre','contactocargo','contactotelefono','contactomail','logo'];
}
