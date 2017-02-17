<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Responsable extends Model
{
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    protected $fillable = ['email','nombre','tlf','foto'];
}
