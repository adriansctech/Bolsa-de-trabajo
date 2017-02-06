<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Responsable extends Model
{
    protected $fillable = ['email','nombre','tlf','foto'];
}
