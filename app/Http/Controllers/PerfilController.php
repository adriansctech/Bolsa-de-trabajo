<?php

namespace Bolsa\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Bolsa\User;
use Bolsa\Alumno;
use Bolsa\Ciclo;
use Bolsa\Idioma;
use Bolsa\cicloAlumno;
use Bolsa\idiomaAlumno;

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


        protected function editAlumno(){

            $usuario = User::findOrFail(Auth::User()->email);

            //obtener un array con todos los ciclos mediante el modelo
            $ciclos = Ciclo::all();
            //obtener un array con todos los idiomas mediante el modelo
            $idiomas = Idioma::all();



      $datosUsuario = array(
          'email' => Auth::User()->email,
          'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
          'apellidos' => isset($usuario->Tipo->apellidos)?$usuario->Tipo->apellidos:'',
          'domicilio' => isset($usuario->Tipo->domicilio)?$usuario->Tipo->domicilio:'',
          'telefono' => isset($usuario->Tipo->tlf)?$usuario->Tipo->tlf:'',
          'poblacion' => isset($usuario->Tipo->poblacion)?$usuario->Tipo->poblacion:'',
          'cv' => isset($usuario->Tipo->cvlinkedin)?$usuario->Tipo->cvlinkedin:'',
          'trabajoFuera' => isset($usuario->Tipo->trabajofuera)?$usuario->Tipo->trabajofuera:'',
          );

            return view('perfiles.editar.alumno', array('usuario'=>$datosUsuario, 'ciclos'=>$ciclos, 'idiomas'=>$idiomas));

        }


        protected function showAlumno(){

                $usuario = User::findOrFail(Auth::User()->email);

                //obtener un array con los ciclos del alumno
                $ciclosAlumno = cicloAlumno::where('alumno',Auth::User()->email)->get();
                
                //obtener un array con los idiomas del alumno
                $idiomasAlumno = idiomaAlumno::where('email',Auth::User()->email)->get();




          $datosUsuario = array(
              'email' => Auth::User()->email,
              'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
              'apellidos' => isset($usuario->Tipo->apellidos)?$usuario->Tipo->apellidos:'',
              'domicilio' => isset($usuario->Tipo->domicilio)?$usuario->Tipo->domicilio:'',
              'telefono' => isset($usuario->Tipo->tlf)?$usuario->Tipo->tlf:'',
              'poblacion' => isset($usuario->Tipo->poblacion)?$usuario->Tipo->poblacion:'',
              'cv' => isset($usuario->Tipo->cvlinkedin)?$usuario->Tipo->cvlinkedin:'',
              'trabajoFuera' => isset($usuario->Tipo->trabajofuera)?$usuario->Tipo->trabajofuera:'',
              );

                return view('perfiles.alumno', array('usuario'=>$datosUsuario, 'ciclos'=>$ciclosAlumno, 'idiomas'=>$idiomasAlumno));
        }

        //MODIFICAR PARA LOS DATOS DE LA EMPRESA
        protected function editEmpresa(){

            $usuario = User::findOrFail(Auth::User()->email);

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


            return view('perfiles.editar.empresa', array('usuario'=>$datosUsuario));

        }

        protected function editResponsable(){

            $usuario = User::findOrFail(Auth::User()->email);

               $datosUsuario = array(
                   'email' => Auth::User()->email,
                   'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
                   'tlf' => isset($usuario->Tipo->tlf)?$usuario->Tipo->tlf:'',
                   'foto' => isset($usuario->Tipo->foto)?$usuario->Tipo->foto:'../img/user.jpg'
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

               $datosUsuario = array(
                   'email' => Auth::User()->email,
                   'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
                   'tlf' => isset($usuario->Tipo->tlf)?$usuario->Tipo->tlf:'',
                   'foto' => isset($usuario->Tipo->foto)?$usuario->Tipo->foto:'../img/user.jpg'
                   );


            return view('principales.responsable', array('usuario'=>$datosUsuario));
        }


        public function getResponsableEmpresas(){

          $empresas=Empresa::all();


          return view('responsable.empresas',array('empresas'=>$empresas));

        }



        public function newEmpresa(Request $request){
          $usuario=new User;
          $usuario->fill($request->all());
          $usuario->save();

          $e = new Empresa;
          $e->fill($request->all()); 
          $e->save();

          return view('responsable.newEmpresa');

        }

        public function getResponsableAlumnos(){
            $alumnos=Alumno::where('valido',0)->get();

          return view('responsable.alumnos',array('alumnos'=>$alumnos));

        }
        public function validaAlumno(Request $request){

          $alumno=Alumno::findOrFail($request->id);
          $alumno->valido=1;
          $alumno.save();

          return view('responsable.alumnos');

        }

        public function getAlumno(Request $request){

          return view('responsable.alumno',array('alumno',Alumno::findOrFail($request->id)));



        }


        public function getEmpresa(Request $request){

          return view('responsable.alumno',array('alumno',Empresa::findOrFail($request->id)));

          return view('responsable.empresa');

        }
        
    }

