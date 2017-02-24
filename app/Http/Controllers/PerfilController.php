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
use Bolsa\Oferta;
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

          //Guardado de contraseña
          $usuario = User::findOrFail(Auth::User()->email);
          
          if(Hash::check($request->Cpass, Auth::User()->password)){
            if ($request->pass!='') {

              if ($request->pass==$request->pass2) {

                $usuario->password=bcrypt($request->pass);

              }
            }
          }
          $usuario->save();
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

if (session()->get('empresa')!=null) {
$usuario = Empresa::findOrFail(session()->get('empresa'));
}
    else{$usuario = Empresa::findOrFail(Auth::User()->email);}


  $datosUsuario = array(
      'email' => $usuario->email,
      'cif' => isset($usuario->cif)?$usuario->cif:'',
      'nombre' => isset($usuario->nombre)?$usuario->nombre:'',
      'actividad' => isset($usuario->actividad)?$usuario->actividad:'',
      'domicilio' => isset($usuario->domicilio)?$usuario->domicilio:'',
      'poblacion' => isset($usuario->poblacion)?$usuario->poblacion:'',
      'tlf' => isset($usuario->tlf)?$usuario->tlf:'',
      'web' => isset($usuario->web)?$usuario->web:'',
      'nombreContacto' => isset($usuario->nombreContacto)?$usuario->nombreContacto:'',
      'cargoContacto' => isset($usuario->cargoContacto)?$usuario->cargoContacto:'',
      'tlfContacto' => isset($usuario->tlfContacto)?$usuario->tlfContacto:'',
      'emailContacto' => isset($usuario->emailContacto)?$usuario->emailContacto:'',
      'logo' => isset($usuario->logo)?$usuario->logo:'/img/user.jpg',
      'sector' => isset($usuario->sector)?$usuario->sector:'',
      );

        return view('perfiles.empresa', array('usuario'=>$datosUsuario));
}

        //MODIFICAR PARA LOS DATOS DE LA EMPRESA
        protected function editEmpresa(){
          if (session()->get('empresa')!=null) {
           $usuario = Empresa::findOrFail(session()->get('empresa'));
          }
              else{$usuario = Empresa::findOrFail(Auth::User()->email);}



           
             $datosUsuario = array(
                 'email' => $usuario->email,
                 'cif' => isset($usuario->cif)?$usuario->cif:'',
                 'nombre' => isset($usuario->nombre)?$usuario->nombre:'',
                 'actividad' => isset($usuario->actividad)?$usuario->actividad:'',
                 'domicilio' => isset($usuario->domicilio)?$usuario->domicilio:'',
                 'poblacion' => isset($usuario->poblacion)?$usuario->poblacion:'',
                 'tlf' => isset($usuario->tlf)?$usuario->tlf:'',
                 'web' => isset($usuario->web)?$usuario->web:'',
                 'nombreContacto' => isset($usuario->nombreContacto)?$usuario->nombreContacto:'',
                 'cargoContacto' => isset($usuario->cargoContacto)?$usuario->cargoContacto:'',
                 'tlfContacto' => isset($usuario->tlfContacto)?$usuario->tlfContacto:'',
                 'emailContacto' => isset($usuario->emailContacto)?$usuario->emailContacto:'',
                 'logo' => isset($usuario->logo)?$usuario->logo:'/img/user.jpg',
                 'sector' => isset($usuario->sector)?$usuario->sector:'',
                 'ofertas' =>Oferta::where('cif',isset($usuario->cif)?$usuario->cif:''),
                 );

            return view('perfiles.editar.empresa', array('usuario'=>$datosUsuario));

        }

          protected function saveEditEmpresa(Request $request){
            if (session()->get('empresa')!=null) {

             $empresa = Empresa::findOrFail(session()->get('empresa'));
             $usuario = User::findOrFail(session()->get('empresa'));
            }
            else{$empresa = Empresa::findOrFail(Auth::User()->email);
            $usuario = User::findOrFail(Auth::User()->email);}


            if(Hash::check($request->Cpass, $usuario->password)){
              if ($request->pass!='') {

                if ($request->pass==$request->pass2) {

                  $usuario->password=bcrypt($request->pass);

                }
              }

            }
            
            $empresa->fill($request->all());
            $usuario->save();
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

          //Guardado de contraseña
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


