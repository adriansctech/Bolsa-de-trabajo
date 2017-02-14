<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class cicloOferta extends Model
{
    protected $table = "ciclosofertas";
    protected $fillable = ['ciclo','ofertas'];
}
