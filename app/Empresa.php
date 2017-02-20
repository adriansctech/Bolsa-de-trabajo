<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    protected $fillable = ['email', 'cif', 'nombre','actividad','domicilio','poblacion','tlf','web','nombreContacto','cargoContacto','tlfContacto','emailContacto','logo','sector'];

      public function Ofertas(){

          
                return  $this->hasMany('\Bolsa\Oferta','cif','cif');
  }
}
