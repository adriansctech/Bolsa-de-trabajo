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

class IdiomaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

        public function insertarIdiomas(Request $request){

          //recibir los valores y guardarlos
          $alumnoIdioma = new idiomaAlumno;
          $alumnoIdioma->fill($request->all());
          $alumnoIdioma->save();


        }
        
        public function verIdiomasEditar(){

     /*     $idiomasAlumno = idiomaAlumno::findOrFail(Auth::User()->email);

          return view('perfiles.alumno', array('idiomas'=>$idiomasAlumno));*/

        }

        
        
    }

