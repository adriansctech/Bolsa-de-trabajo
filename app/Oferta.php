<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Oferta extends Model
{
protected $fillable = ['id', 'puesto', 'contrato','valido','descripcion','cif','responsable'];

    public function Empresa(){

        
              return  $this->hasOne('\Bolsa\Empresa','cif','cif');
}


}
