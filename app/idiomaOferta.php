<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class idiomaOferta extends Model
{
    protected $table = "ofertasidiomas";
    protected $fillable = ['oferta','idioma'];
}
