<?php

namespace Bolsa;

use Illuminate\Database\Eloquent\Model;


class Oferta extends Model
{
protected $fillable = ['id', 'puesto', 'contrato','valido','descripcion','cif','responsable'];

    public function Empresa(){

        
              return  $this->hasOne('\Bolsa\Empresa','cif','cif');
	}

    public function cicloOferta(){

    		
            return  $this->BelongsToMany(Ciclo::class,'ciclosofertas','ofertas','ciclo');
	}

    public function idiomaOferta(){

    		
            return  $this->BelongsToMany(Idioma::class,'ofertasIdiomas','oferta','idioma');
	}


}
