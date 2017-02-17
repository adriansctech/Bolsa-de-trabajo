<?php

namespace Bolsa\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Bolsa\User;
use Bolsa\Alumno;
use Bolsa\Ciclo;
use Bolsa\Idioma;
use BOlsa\AlumnosCiclos;

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

        protected function saveAlumno(Request $request){
            
            $a = new Alumno;
            $a->fill($request->all());
            $a->save();

        }

        protected function saveEmpresa(Request $request){
            $e = new Empresa;
            $e->fill($request->all());
            $e->save();
        }

        protected function saveResponsable(Request $request){
            $r = new Responsable;
            $r->fill($request->all());
            $e->save();
        }

        protected function saveEditAlumno(Request $request){

          $alumno = Alumno::findOrFail(Auth::User()->email);
          //DATOS DEL ALUMNO
          //obtener los datos de los input
          $alumno->nombre = $request->input('nombre');
          $alumno->apellidos = $request->input('apellidos');
          $alumno->domicilio = $request->input('domicilio');
          $alumno->email = $request->input('email');
          $alumno->tlf = $request->input('telefono');
          $alumno->cvlinkedin = $request->input('enlaceCV');
          $alumno->trabajofuera = $request->input('trabajoFuera');
          //guardar
          $alumno->save();
          //DATOS DE LOS CICLOS
      /*    $alumnociclo = AlumnosCiclos::findOfFail(Auth::User()->email);

          if($alumnociclo == null){
            //recorrer todos los ciclos de la lista

            //crear nuevo registro
            $alumnociclo = new AlumnosCiclos;
            $alumnociclo->ciclo =
            $alumnociclo->alumno = $request->input('email');
            $alumnociclo->finicio =
            $alumnociclo->ffin =
            $alumnociclo->nota =
            $alumnociclo->empresa =

          }else{



          }*/
          
          //redireccionar
          return redirect("/alumno/perfil");

        }

        protected function editAlumno(){

            $usuario = User::findOrFail(Auth::User()->email);

            //obtener un array con todos los ciclos mediante el modelo
            $ciclos = Ciclo::all();
            //obtener un array con todos los idiomas mediante el modelo
            $idiomas = Idioma::all();

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

            return view('perfiles.editar.alumno', array('usuario'=>$datosUsuario, 'ciclos'=>$ciclos, 'idiomas'=>$idiomas));

        }

        protected function showAlumno(){

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

        //MODIFICAR PARA LOS DATOS DE LA EMPRESA
        protected function editEmpresa(){

            $usuario = User::findOrFail(Auth::User()->email);

          /*  if ($usuario->Tipo!=null) {

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

            }else{*/

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

            //}

            return view('perfiles.editar.empresa', array('usuario'=>$datosUsuario));

        }
        protected function editResponsable(){

            $usuario = User::findOrFail(Auth::User()->email);


                $datosUsuario = array(
                    'email' => Auth::User()->email,
                    'nombre' => ''
                    );


            return view('perfiles.editar.responsable', array('usuario'=>$datosUsuario));

        }
        protected function perfilEmpresa(){


            return view('perfiles.empresa');
        }

        protected function perfilResponsable(){


            return view('perfiles.responsable');
        }

        public function responsablePrincipal(){

            $usuario = User::findOrFail(Auth::User()->email);

            if ($usuario->Tipo!=null) {
            
               $datosUsuario = array(
                   'email' => Auth::User()->email,
                   'nombre' => $usuario->Tipo->nombre,
                   'foto' => $usuario->Tipo->foto
                   );

            }else{

                $datosUsuario = array(
                    'email' => Auth::User()->email,
                    'nombre' => '',
                    'foto' => ''

                    );
            }

            return view('principales.responsable', array('usuario'=>$datosUsuario));
        }

        public function getResponsableEmpresas(){



          return view('responsable.empresas');

        }

        public function getResponsableOfertas(){



          return view('responsable.ofertas');

        }

        public function newEmpresa(){



          return view('responsable.newEmpresa');

        }

        public function getResponsableAlumnos(){



          return view('responsable.alumnos');

        }

        public function getAlumno(){



          return view('responsable.alumno');

        }

        public function getEmpresa(){



          return view('responsable.empresa');

        }
        
    }

