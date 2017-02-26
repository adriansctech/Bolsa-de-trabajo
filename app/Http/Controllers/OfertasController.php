<?php

namespace Bolsa\Http\Controllers;

use Illuminate\Http\Request;
use Bolsa\Oferta;
use Auth;
use Bolsa\User;
use Bolsa\Ciclo;
use Bolsa\cicloOferta;
use Bolsa\idiomaOferta;
use Bolsa\Idioma;
use Bolsa\Alumno;
use Bolsa\Empresa;

class OfertasController extends Controller
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

    //Recoge todas las ofertas de la base de datos y las pasa como parametro "ofertas" a la vista principal del usuario
    public function getOfertasAlumno(){
        //
        $usuario = User::findOrFail(Auth::User()->email);
        $perfil= Alumno::find(Auth::User()->email);
        //Comprueba si el usuario es válido

        if($perfil->valido==1){
          //Carga los datos del alumno en la array para enviarla a la vista principal del usuario
           $datosUsuario = array(
               'email' => Auth::User()->email,
               'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
               'apellidos' => isset($usuario->Tipo->apellidos)?$usuario->Tipo->apellidos:'',
               'foto' => isset($usuario->Tipo->foto)?$usuario->Tipo->foto:'/img/user.jpg',
               );


        //Carga todas las ofertas validas en un array
        $ofertas=Oferta::where('valido',1)->get();

        return view('principales.alumno', array('ofertas'=>$ofertas,'usuario'=>$datosUsuario));
      }else{

        //Si el usuario no es valido le redirije a editar su perfil para modificar datos
        return redirect('/alumno/perfil/editar');
      }
    }


//Devuelve los datos para una empresa en concreto, pagina principal

    public function getOfertasEmpresa($email=null){
      //Para saber si el usuario es un empleado o un responsable, pasamos el email de la empresa para buscarla si accedemos desde el responsable

      //Cargamos un usuario o otro dependiendo si es empresa o responsable
      if ((session()->get('empresa')!=null) || ($email!= null)) {
        
        session()->put('empresa', $email==null?session()->get('empresa'):$email);
    

        $usuario= Empresa::find( session()->get('empresa'));

      }else{

        $usuario= Empresa::find(Auth::User()->email);

      }
        

          
      
           $datosUsuario = array(
               'email' => $usuario->email,
               'nombre' => isset($usuario->nombre)?$usuario->nombre:'',
               'web' => isset($usuario->web)?$usuario->web:'',
               'logo' => isset($usuario->logo)?$usuario->logo:'../img/user.jpg',
               );
           //Carga las ofertas de la empresa dependiendo de su cif
           $ofertas=Oferta::where('cif',isset($usuario->cif)?$usuario->cif:'')->where('valido',1)->get();
           
          return view('principales.empresa', array('ofertas'=>$ofertas,'usuario'=>$datosUsuario));
      
    }

//Redirige según el tipo de usuario a su página principal
    public function chooseHomeUser(){

       

        if(Auth::User()->tipo == "alumno"){

            return redirect("/alumno");

        }else{
            if (Auth::User()->tipo == "empresa") {
                return redirect("/empresa");
       
        }else{
            return redirect("/responsable");

        } }

    }


    //Recoge el id y devuelve la vista con la oferta asociada a este
    public function getOferta($id){

        return view('oferta', array('oferta'=>Oferta::findOrFail($id)));

    }

    //Devuelve la pagina de crear una nueva oferta
    protected function crearOferta(){

        return view('empresa.crearOferta', array('ciclos'=>Ciclo::all(),'idiomas'=>Idioma::all()));
    }

    //Crea una nueva oferta para la empresa seleccionada, o edita una oferta ya creada
    public function newOferta(Request $request){

  if (session()->get('empresa')!=null) {

   $usuario = Empresa::findOrFail(session()->get('empresa'));
  }
  else{$usuario = Empresa::findOrFail(Auth::User()->email);}

     

            $oferta = $request->all();
            //Si la oferta existe carga los datos de la oferta, sino, crea una nueva oferta
            $o=isset($oferta['id'])?Oferta::findOrFail($oferta['id']):new Oferta();
            $o->fill($oferta); 
            $o->valido=0;
            $o->cif=$usuario->cif;
            $o->save();
            //Al añadir los ciclosy idiomas de una oferta elimina los anteriores para que no se solapen
            cicloOferta::where('ofertas',$o->id)->delete();
            idiomaOferta::where('oferta',$o->id)->delete();

            //ciclos requeridos para la oferta
            foreach ($oferta['ciclo'] as $ciclo) {

                $ciclo=strtolower($ciclo);
                $cicloReq = new cicloOferta;
                $ciclo = Ciclo::where('ciclos', '=' ,$ciclo)->firstOrFail();
                $cicloReq->ciclo=$ciclo->id;
                $cicloReq->ofertas=$o->id;
                $cicloReq->save();
            }

            //idiomas requeridos para la oferta
            foreach ($oferta['idiomas'] as $idioma) {
                $idioma=strtolower($idioma);
                $idiomaReq = new idiomaOferta;
                $idioma = Idioma::where('idioma', '=' ,$idioma)->firstOrFail();
                $idiomaReq->idioma=$idioma->id;
                $idiomaReq->oferta=$o->id;
                $idiomaReq->save();
            }
           //Devuelve la pagina de la nueva oferta
            return redirect('/empresa/ofertaEmpresa/'.$o["id"].'');

    }

    //Borra la oferta especificada
    public function deleteOferta(Request $request){

        $oferta=Oferta::findOrFail($request->oferta);
        $oferta->delete();
        //Y devuelve a la pagina principal de empresa
        return redirect('/empresa');
    }
    //Valida la oferta especificada
    public function validaOferta(Request $request){

        $oferta=Oferta::findOrFail($request->id);
        $oferta->valido=1;
        $oferta->save();
        //Devuelve la vista de todas las ofertas por validar del responsable
        return redirect('/responsable/ofertas');
    }

    //Devuelve las ofertas no validadas para que el responsable pueda validarlas
    public function getOfertasResponsable(){
      $ofertas=Oferta::where('valido',0)->get();

      return view('responsable.ofertas',array('ofertas'=>$ofertas));
    }


    //Devuelve una oferta en concreto para ser vista o validad por el responsable
    public function getROferta($id){

        return view('responsable.oferta', array('oferta'=>Oferta::findOrFail($id)));

    }
    //Devuelve la vista de una oferta en concreto para la empresa
    public function ofertaEmpresa($id){

      return view('empresa.ofertaEmpresa', array('oferta'=>Oferta::findOrFail($id)));

    }

    //Devuelve los datos necesarios para editar una oferta de la empresa seleccionada
    public function editarOfertaEmpresa($id){

        $oferta=Oferta::findOrFail($id);
       $ciclosO=$oferta->cicloOferta;

        
             $idiomasO=$oferta->idiomaOferta;
             foreach ($idiomasO as $idioma) {
               $idiomas[$idioma->id] = $idioma->id ;
             }
             foreach ($ciclosO as $ciclo) {
               $ciclos[$ciclo->id] = $ciclo->id ;
             }

             $todoslosciclos=Ciclo::All();
             $todoslosidiomas=Idioma::All();

           return view('empresa.editarOfertaEmpresa', compact('oferta','ciclos','idiomas','todoslosciclos','todoslosidiomas'));
    }

}
