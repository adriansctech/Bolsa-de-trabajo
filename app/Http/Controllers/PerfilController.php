<?php

namespace Bolsa\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Bolsa\User;
use Bolsa\Alumno;

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

        protected function perfilAlumnoEditar(){

            $usuario = User::findOrFail(Auth::User()->email);

            if ($usuario->Tipo!=null) {

            $datosUsuario = array(
                   'email' => Auth::User()->email,
                   'nombre' => $usuario->Tipo->nombre,
                   'apellidos' => $usuario->Tipo->apellidos,
                   'domicilio' => $usuario->Tipo->domicilio,
                   'telefono' => $usuario->Tipo->tlf,
                   'poblacion' => $usuario->Tipo->poblacion,
                   'cv' => $usuario->Tipo->cvlinkedin,
                   'trabajoFuera' => $usuario->Tipo->trabajofuera,
                   'pass' => $usuario->password,
                   );

            }else{

                $datosUsuario = array(
                    'email' => Auth::User()->email,
                    'nombre' => '',
                    'apellidos' => '',
                    'domicilio' => '',
                    'telefono' => '',
                    'poblacion' => '',
                    'cv' => '',
                    'trabajoFuera' => '',
                    'pass' => '',
                    );

            }

            return view('perfiles.editar.alumno', array('usuario'=>$datosUsuario));

        }


        protected function perfilAlumnoMostrar(){

            $usuario = User::findOrFail(Auth::User()->email);
            
            if ($usuario->Tipo!=null) {

               $datosUsuario = array(
                   'email' => Auth::User()->email,
                   'nombre' => $usuario->Tipo->nombre,
                   'apellidos' => $usuario->Tipo->apellidos,
                   'domicilio' => $usuario->Tipo->domicilio,
                   'telefono' => $usuario->Tipo->tlf,
                   'poblacion' => $usuario->Tipo->poblacion,
                   'cv' => $usuario->Tipo->cvlinkedin,
                   'trabajoFuera' => $usuario->Tipo->trabajofuera,
                   );

            }else{

                $datosUsuario = array(
                    'email' => Auth::User()->email,
                    'nombre' => '',
                    'apellidos' => '',
                    'domicilio' => '',
                    'telefono' => '',
                    'poblacion' => '',
                    'cv' => '',
                    'trabajoFuera' => '',
                    );

            }

            return view('perfiles.alumno', array('usuario'=>$datosUsuario));

        }

        protected function perfilEmpresa(){


            return view('perfiles.empresa');
        }
        protected function perfilResponsable(){


            return view('perfiles.responsable');
        }

    }

