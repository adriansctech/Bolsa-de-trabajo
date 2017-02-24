<?php

namespace Bolsa\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Bolsa\User;
use Bolsa\Alumno;
use Bolsa\Ciclo;
use Bolsa\Idioma;
use Bolsa\AlumnosCiclos;
use Bolsa\cicloAlumno;
use Bolsa\idiomaAlumno;
use Bolsa\Empresa;

class CiclosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

        public function insertarCiclos(Request $request){

          //recibir los valores y guardarlos
          $alumnoCiclo = new AlumnosCiclos;
          $alumnoCiclo->fill($request->all());
          $alumnoCiclo->save();


        } 
        
    }

