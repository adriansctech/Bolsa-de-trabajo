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

        }

        protected function editEmpresa(Request $request){
            $e = new Empresa;
            $e->fill($request->all());
        }

        protected function editResponsable(Request $request){
            $r = new Responsable;
            $r->fill($request->all());
        }

    }
}
