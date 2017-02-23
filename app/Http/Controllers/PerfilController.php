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
use Bolsa\Responsable;
use Hash;
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
          $alumno->nombre = $request->nombre;
          $alumno->apellidos = $request->apellidos;
          $alumno->domicilio = $request->domicilio;
          $alumno->email = $request->email;
          $alumno->tlf = $request->telefono;
          $alumno->cvlinkedin = $request->enlaceCV;
          $alumno->trabajofuera = $request->trabajoFuera;
          //guardar
          $alumno->save();

          
          //redireccionar
          return redirect("/alumno/perfil");

        }

        protected function editAlumno(){

            $usuario = User::findOrFail(Auth::User()->email);

            //obtener un array con todos los ciclos mediante el modelo
            $ciclos = Ciclo::all();
            //obtener un array con todos los idiomas mediante el modelo
            $idiomas = Idioma::all();
            //obtener los idiomas del alumno logueado
            $idiomasAlumno = idiomaAlumno::where("email", Auth::User()->email)->get();
            //obtener los ciclos del alumno logueado
            $ciclosAlumno = AlumnosCiclos::where("alumno", Auth::User()->email)->get();



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

            return view('perfiles.editar.alumno', array('usuario'=>$datosUsuario, 'ciclos'=>$ciclos, 'idiomas'=>$idiomas, 'idiomasAlumno'=>$idiomasAlumno, 'ciclosAlumno'=>$ciclosAlumno));

        }

        protected function perfilAlumno(){

                $usuario = User::findOrFail(Auth::User()->email);

                //obtener un array con los ciclos del alumno
                $ciclosAlumno = $usuario->Tipo->Ciclos;

                //obtener los idiomas del alumno logueado
                $idiomasAlumno = idiomaAlumno::where("email", Auth::User()->email)->get();
                
                //obtener los ciclos del alumno logueado
                $ciclosAlumno = AlumnosCiclos::where("alumno", Auth::User()->email)->get();



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

                return view('perfiles.alumno', array('usuario'=>$datosUsuario, 'ciclos'=>$ciclosAlumno, 'idiomas'=>$idiomasAlumno, 'ciclosAlumno'=>$ciclosAlumno));
        }

       protected function perfilEmpresa(){

    $usuario = User::findOrFail(Auth::User()->email);


  $datosUsuario = array(
      'email' => Auth::User()->email,
      'cif' => isset($usuario->Tipo->cif)?$usuario->Tipo->cif:'',
      'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
      'actividad' => isset($usuario->Tipo->actividad)?$usuario->Tipo->actividad:'',
      'domicilio' => isset($usuario->Tipo->domicilio)?$usuario->Tipo->domicilio:'',
      'poblacion' => isset($usuario->Tipo->poblacion)?$usuario->Tipo->poblacion:'',
      'tlf' => isset($usuario->Tipo->tlf)?$usuario->Tipo->tlf:'',
      'web' => isset($usuario->Tipo->web)?$usuario->Tipo->web:'',
      'nombreContacto' => isset($usuario->Tipo->nombreContacto)?$usuario->Tipo->nombreContacto:'',
      'cargoContacto' => isset($usuario->Tipo->cargoContacto)?$usuario->Tipo->cargoContacto:'',
      'tlfContacto' => isset($usuario->Tipo->tlfContacto)?$usuario->Tipo->tlfContacto:'',
      'emailContacto' => isset($usuario->Tipo->emailContacto)?$usuario->Tipo->emailContacto:'',
      'logo' => isset($usuario->Tipo->logo)?$usuario->Tipo->logo:'/img/user.jpg',
      'sector' => isset($usuario->Tipo->sector)?$usuario->Tipo->sector:'',
      );

        return view('perfiles.empresa', array('usuario'=>$datosUsuario));
}

        //MODIFICAR PARA LOS DATOS DE LA EMPRESA
        protected function editEmpresa(){

            $usuario = User::findOrFail(Auth::User()->email);

               $usuario = User::findOrFail(Auth::User()->email);

             $datosUsuario = array(
                 'email' => Auth::User()->email,
                 'cif' => isset($usuario->Tipo->cif)?$usuario->Tipo->cif:'',
                 'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
                 'actividad' => isset($usuario->Tipo->actividad)?$usuario->Tipo->actividad:'',
                 'domicilio' => isset($usuario->Tipo->domicilio)?$usuario->Tipo->domicilio:'',
                 'poblacion' => isset($usuario->Tipo->poblacion)?$usuario->Tipo->poblacion:'',
                 'tlf' => isset($usuario->Tipo->tlf)?$usuario->Tipo->tlf:'',
                 'web' => isset($usuario->Tipo->web)?$usuario->Tipo->web:'',
                 'nombreContacto' => isset($usuario->Tipo->nombreContacto)?$usuario->Tipo->nombreContacto:'',
                 'cargoContacto' => isset($usuario->Tipo->cargoContacto)?$usuario->Tipo->cargoContacto:'',
                 'tlfContacto' => isset($usuario->Tipo->tlfContacto)?$usuario->Tipo->tlfContacto:'',
                 'emailContacto' => isset($usuario->Tipo->emailContacto)?$usuario->Tipo->emailContacto:'',
                 'logo' => isset($usuario->Tipo->logo)?$usuario->Tipo->logo:'/img/user.jpg',
                 'sector' => isset($usuario->Tipo->sector)?$usuario->Tipo->sector:'',
                 );

            return view('perfiles.editar.empresa', array('usuario'=>$datosUsuario));

        }

          protected function saveEditEmpresa(Request $request){

            $empresa = Empresa::findOrFail(Auth::User()->email);

            $empresa->fill($request->all());
            $empresa->save();

            
            return redirect("/empresa/perfil");

          }

        protected function editResponsable(){

            $usuario = User::findOrFail(Auth::User()->email);

               $datosUsuario = array(
                   'email' => Auth::User()->email,
                   'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
                   'tlf' => isset($usuario->Tipo->tlf)?$usuario->Tipo->tlf:'',
                   'foto' => isset($usuario->Tipo->foto)?$usuario->Tipo->foto:'/img/user.jpg'
                   );

            return view('perfiles.editar.responsable', array('usuario'=>$datosUsuario));

        }

        protected function saveEditResponsable(Request $request){

          $empresa = Responsable::findOrFail(Auth::User()->email);
          $usuario = User::findOrFail(Auth::User()->email);
          $empresa->fill($request->all());

          if(Hash::check($request->Cpass, Auth::User()->password)){
            if ($request->pass!='') {

              if ($request->pass==$request->pass2) {

                $usuario->password=bcrypt($request->pass);

              }
            }

          }
          $empresa->save();
          $usuario->save();

          return redirect("/responsable/perfil");

        }

    

        protected function perfilResponsable(){
          $usuario = User::findOrFail(Auth::User()->email);
          $datosUsuario = array(
            
              'email' => Auth::User()->email,
              'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
              'tlf' => isset($usuario->Tipo->tlf)?$usuario->Tipo->tlf:'',
              'foto' => isset($usuario->Tipo->foto)?$usuario->Tipo->foto:'/img/user.jpg',
              );

            return view('perfiles.responsable', array('usuario'=>$datosUsuario));
        }


        public function responsablePrincipal(){

            $usuario = User::findOrFail(Auth::User()->email);

               $datosUsuario = array(
                   'email' => Auth::User()->email,
                   'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
                   'tlf' => isset($usuario->Tipo->tlf)?$usuario->Tipo->tlf:'',
                   'foto' => isset($usuario->Tipo->foto)?$usuario->Tipo->foto:'/img/user.jpg'
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
          $usuario->password=null;
          $usuario->tipo='empresa';
          if ($request->pass==$request->pass2) {
            $usuario->password=$request->pass;
          }else{

            redirect('/responsable/empresas/new');

          }
          $usuario->save();

          $e = new Empresa;
          $e->fill($request->all()); 
          $e->save();

          //Cambiar a la empresa en concreto
          return redirect('/responsable/empresas');

        }

        public function getResponsableAlumnos(){
            $alumnos=Alumno::where('valido',0)->get();

          return view('responsable.alumnos',array('alumnos'=>$alumnos));

        }


        public function validaAlumno(Request $request){

          $alumno=Alumno::findOrFail($request->email);
          $alumno->valido=1;
          $alumno->save();

          return redirect('/responsable/alumnos');

        }

        public function getRAlumno($id){

          $usuario = Alumno::findOrFail($id);
          $ciclos = $usuario->Ciclos;
          $idiomas = $usuario->Idiomas;

          return view('responsable.alumno',compact('usuario','ciclos','idiomas'));
        }


        public function getREmpresa(Request $request){

     

          return view('responsable.empresa');

        }
        }


