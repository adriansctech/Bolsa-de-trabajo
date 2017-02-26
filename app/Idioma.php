<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Idioma extends Model
{
    protected $primaryKey = 'idioma';
    protected $keyType = 'string';
    protected $fillable = ['idioma'];
}
