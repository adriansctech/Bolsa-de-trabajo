<?php

namespace Bolsa\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

        protected function editAlumno(Request $request){
            
            $a = new Alumno;
            $a->fill($request->all());
            $a->save();

        }

        protected function editEmpresa(Request $request){
            $e = new Empresa;
            $e->fill($request->all());
            $e->save();
        }

        protected function editResponsable(Request $request){
            $r = new Responsable;
            $r->fill($request->all());
            $e->save();
        }
        protected function perfilAlumno(){


            return view('perfiles.alumno');
        }
        protected function perfilEmpresa(){


            return view('perfiles.empresa');
        }
        protected function perfilResponsable(){


            return view('perfiles.responsable');
        }

    }

